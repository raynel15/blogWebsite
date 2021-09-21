<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use DB;

class AccountRepository
{
    public function insertData($data)
    {
        return DB::table('users')
            ->insert($data);
    }
    public function getExist($email){
        return DB::table('users')
            ->where('email',$email)
            ->first();
    }
    public function updateData($id,$name,$description,$image){
        return DB::table('users')
            ->where('id',$id)
            ->update(['profile_name' => $name, 'profile_description' => $description, 'profile_image' => $image]);
    }
    public function showProfile($name){
        return DB::table('users')
            ->where('profile_name', $name)
            ->first();
    }
    public function showUsers(){
        return DB::table('users')
            ->where('email', '!=', 'admin@gmail.com')
            ->get();
    }
    public function editUser($id,$email){
        return DB::table('users')
            ->where('id',$id)
            ->update(['email' => $email]);
    }
    public function deleteUser($id){
        return DB::table('users')
            ->where('id',$id)
            ->delete();
    }
    public function countUsers(){
        return DB::table('users')
            ->where('email', '!=', 'admin@gmail.com')
            ->count();
    }
}
