<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', function () {
    return view('userlogin');
});
Route::get('userlogin', [AccountController::class, 'checkSession'])->name('login');
Route::post('login', [AccountController::class, 'loginUser']);
Route::post('login/reg', [AccountController::class, 'registerUser']);
Route::get('logout', [AccountController::class, 'logout']);
Route::get('register', function () {
    return view('register');
});

Route::middleware(['auth'])->group(function () {
    Route::get('admin-index', [AccountController::class, 'countUsers']);
    Route::get('userlist', [AccountController::class, 'showUsers']);
    Route::post('userlist/edit', [AccountController::class, 'editUsers']);
    Route::post('userlist/delete', [AccountController::class, 'deleteUsers']);
    Route::post('userlist/add', [AccountController::class, 'addUser']);

    Route::get('/index', function () {
        return view('index');
    });
    Route::get('profile', [AccountController::class, 'getUser']);
    Route::get('userprofile/{name}', [AccountController::class, 'getProfile']);
    Route::post('upload', [AccountController::class, 'updateData']);


    Route::get('blogs', [BlogController::class, 'getBlogs']);
    Route::get('myblogs/{name}', [BlogController::class, 'getMyBlogs']);
    Route::post('blogupload', [BlogController::class, 'blogupload']);
    Route::get('blogpage/{id}', [BlogController::class, 'getDisplay']);
    Route::post('myblogs/edit', [BlogController::class, 'editBlog']);
    Route::post('myblogs/delete', [BlogController::class, 'deleteBlog']);
});

