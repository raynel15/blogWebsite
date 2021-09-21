<?php

namespace App\Http\Controllers;

use App\Repositories\BlogRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class BlogController extends Controller
{
    public function __construct(BlogRepository $blogRepository){
        $this->repository = $blogRepository;
    }
    public function blogupload(Request $request)
    {
        $user = $request->user();
        $blogtitle = $request->get('blog-title');
        $blogdescription = $request->get('blog-description');
        $data = [
            'blog_poster' => $user->profile_name,
            'blog_title' => $blogtitle,
            'blog_description' => $blogdescription,
            'blog_created' => date('Y-m-d')
        ];
        $insertData = $this->repository->insertBlog($data);
        if($insertData){
            $return = redirect()->back()->with('success','Success');
        }
        else{
            $return = redirect()->back()->with('failed','Failed');
        }
        return $return;
    }
    public function getBlogs(){
        $getBlogs = $this->repository->getBlogs();
        return view('blogs',['getBlogs' => $getBlogs]);
    }
    public function getDisplay($id){
        $showBlog = $this->repository->showBlog($id);
        return view('blogpage',['showBlog' => $showBlog]);
    }
    public function getMyBlogs($name){
        $myBlogs = $this->repository->getMyBlogs($name);
        return view('myblogs',['myBlogs' => $myBlogs]);
    }
    public function editBlog(Request $request){
        $id = $request->input('blog-id');
        $blogtitle = $request->input('blog-title');
        $blogdescription = $request->input('blog-description');
        $editData = $this->repository->editBlog($id,$blogtitle,$blogdescription);
        if($editData){
            $return = redirect()->back()->with('success','Success');

        }
        else{
            $return = redirect()->back()->with('failed','Failed');
        }
        return $return;
    }

    public function deleteBlog(Request $request){
        $id = $request->input('blog-id');
        $deleteUser = $this->repository->deleteBlog($id);
        if ($deleteUser){
            $return = redirect()->back()->with('success','Success');
        }
        else{
            $return = redirect()->back()->with('failed','Failed');

        }
        return $return;
    }
}
