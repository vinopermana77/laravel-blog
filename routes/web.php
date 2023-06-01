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
Route::get('/', [HomeController::class, 'homepage'])->name('homepage');
Route::get('/aboutMe', [HomeController::class, 'aboutMe'])->name('aboutMe');
Route::get('/post_detail/{id}', [HomeController::class, 'postDetail'])->name('postDetail');
Route::get('/error', [HomeController::class, 'errorPage'])->name('errorPage');

// Auth user
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
    Route::get('/create_post', [HomeController::class, 'createPost'])->middleware('auth')->name('createPost');
    Route::post('/user_post', [HomeController::class, 'userPost'])->middleware('auth')->name('userPost');
    Route::get('/my_post', [HomeController::class, 'myPost'])->middleware('auth')->name('myPost');
    Route::get('/edit_post/{id}', [HomeController::class, 'edit'])->middleware('auth')->name('edit');
    Route::post('/userUpdate/{id}', [HomeController::class, 'userUpdate'])->middleware('auth')->name('userUpdate');
    Route::post('/destroy/{id}', [HomeController::class, 'destroy'])->middleware('auth')->name('destroy');
});

// Auth Admin
Route::middleware(['auth', 'admin'])->group(
    function () {
        Route::get('/index', [AdminController::class, 'index'])->name('index');
        Route::get('/create', [AdminController::class, 'create'])->name('create');
        Route::post('/store', [AdminController::class, 'store'])->name('store');
        Route::get('/edit', [AdminController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [AdminController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [AdminController::class, 'destroy'])->name('destroy');
        Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
        Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
        Route::get('/accept_post/{id}', [AdminController::class, 'acceptPost'])->name('acceptPost');
        Route::get('/reject_post/{id}', [AdminController::class, 'rejectPost'])->name('rejectPost');
    }
);

// Setting Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
