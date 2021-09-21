<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use DB;

class BlogRepository
{
    public function insertBlog($data){
        return DB::table('blogs')
            ->insert($data);
    }
    public function getBlogs(){
        return DB::table('blogs')
            ->get();
    }
    public function showBlog($id){
        return DB::table('blogs')
            ->where('id', $id)
            ->first();
    }


    public function getMyBlogs($name){
        return DB::table('blogs')
            ->where('blog_poster', $name)
            ->get();
    }

    public function editBlog($id,$blogtitle,$blogdescription){
        return DB::table('blogs')
            ->where('id', $id)
            ->update(['blog_title' => $blogtitle, 'blog_description' => $blogdescription, 'blog_created' => date('Y-m-d')]);
    }
    public function deleteBlog($id){
        return DB::table('blogs')
            ->where('id',$id)
            ->delete();
    }

}
