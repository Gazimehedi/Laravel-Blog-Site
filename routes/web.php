<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Auth::routes();
Route::get('/', [FrontController::class,'home'])->name('home');
Route::get('/category/{slug}', [FrontController::class, 'category'])->name('category');
Route::get('/tag/{slug}', [FrontController::class, 'tag'])->name('tag');
Route::get('/post/{slug}', [FrontController::class,'post'])->name('post');
Route::get('/about', [FrontController::class,'about'])->name('about');
Route::get('/contact', [FrontController::class,'contact'])->name('contact');
Route::post('/message_send', [FrontController::class,'message_send'])->name('message.send');

//admin routes

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class,'index'])->name('admin');
    Route::resource('category', CategoryController::class)->names('admin.category');
    Route::resource('tag', TagController::class)->names('admin.tag');
    Route::resource('post', PostController::class)->names('admin.post');
    Route::resource('user', UserController::class)->names('admin.user');
    Route::get('userprofile', [UserController::class,'profile'])->name('admin.user.profile');
    Route::put('profileupdate/{user}', [UserController::class,'profileupdate'])->name('admin.user.profileupdate');
    Route::resource('setting', SettingController::class)->names('site.setting');
    Route::resource('message', MessageController::class)->names('admin.message');
});
