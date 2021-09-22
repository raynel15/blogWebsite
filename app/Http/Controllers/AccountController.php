<?php

namespace App\Http\Controllers;

use App\Repositories\AccountRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AccountController extends Controller
{
    public function __construct(AccountRepository $accountRepository){
        $this->repository = $accountRepository;
    }
    public function index()
    {
        return view('index');
    }
    public function registerUser(Request $request)
    {
        $email = $request->get('email');
        $password = Hash::make($request->input('password'));
        $data = [
            'email' => $email,
            'password' => $password,
        ];
        $userExist = $this->repository->getExist($email);
        if ($userExist || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            $return = 'failed';
        }
        else{
            $return = 'success';
            $insertData = $this->repository->insertData($data);
        }
        return $return;
    }
    public function loginUser(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        if(Auth::attempt(['email' => $email, 'password' => $password])){
            $request->session()->regenerate();
            if($email == 'admin@gmail.com'){
                $return = redirect()->back()->with('adminSuccess', 'Admin Success');
            }
            else{
                $return = redirect()->back()->with('success', 'Success');
            }
        }
        else{
            $return = redirect()->back()->with('failed', 'Failed');
        }
        return $return;
    }
    public function getUser(Request $request){
        $user = $request->user();
        return view('profile',['user' => $user]);
    }
    public function getProfile($name){
        $showProfile = $this->repository->showProfile($name);
        return view('userprofile',['showProfile' => $showProfile]);
    }
    public function logout() {
        Auth::logout();
        return redirect('/userlogin');
    }
    public function checkSession(){
            if(Auth::check()){
                $email = Auth::user()->email;
                if($email == "admin@gmail.com"){
                    return redirect('/admin-index');
                }
                else{
                    return redirect('/index');
                }
            }
            else{
                return view('userlogin');
            }
    }
    public function updateData(Request $request)
    {
        $userId = $request->user()->id;
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $name = $request->get('profile-name');
        $description = $request->get('profile-description');
        $updateData = $this->repository->updateData($userId,$name,$description,$imageName);
        if($updateData){
            $return = redirect()->back()->with('success','Success');
        }
        else{
            $return = redirect()->back()->with('failed','Failed');
        }
        return $return;
    }

    public function showUsers(){
        $showuser = $this->repository->showUsers();
        return view('userlist',['showuser' =>$showuser]);
    }

    public function editUsers(Request $request){
        $id = $request->input('id');
        $email = $request->input('email-edit');
        $user = $this->repository->getExist($email);
        if ($user || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            $return = redirect()->back()->with('failed','Failed');

        }
        else{
            $return = redirect()->back()->with('success','Success');
            $editData = $this->repository->editUser($id,$email);
        }
        return $return;
    }

    public function deleteUsers(Request $request){
        $id = $request->input('id');
        $deleteUser = $this->repository->deleteUser($id);
        if ($deleteUser){
            $return = redirect()->back()->with('success','Success');
        }
        else{
            $return = redirect()->back()->with('failed','Failed');

        }
        return $return;
    }

    public function addUser(Request $request)
    {
        $email = $request->get('email');
        $password = Hash::make($request->input('password'));
        $data = [
            'email' => $email,
            'password' => $password,
            'type' => 'user'
        ];
        $userExist = $this->repository->getExist($email);
        if ($userExist || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            $return = redirect()->back()->with('failed','Failed');
        }
        else{
            $return = redirect()->back()->with('success','Success');
            $insertData = $this->repository->insertData($data);
        }
        return $return;
    }

    public function countUsers(){
        $usercount = $this->repository->countUsers();
        return view('admin-index',['usercount' =>$usercount]);
    }
}
