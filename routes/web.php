<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Homepage
Route::get('/', [HomeController::class,'homepage']);

// Auth admin and user
Route::get('/home', [HomeController::class,'index'])->middleware('auth')->name('home');

// Setting Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Create Post
Route::get('/post_page', [AdminController::class,'post_page'])->name('post_page');
Route::post('/create_post', [AdminController::class,'create_post'])->name('create_post');
Route::get('/show_posts', [AdminController::class,'show_posts'])->name('show_posts');


require __DIR__.'/auth.php';
