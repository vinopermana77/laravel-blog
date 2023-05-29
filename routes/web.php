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
// Route::get('/create', [AdminsController::class,'create'])->name('create');
// Route::post('/store', [AdminsController::class,'store'])->name('store');
// Route::get('/index', [AdminsController::class,'index'])->name('index');
// Route::get('/destroy/{id}', [AdminsController::class,'destroy'])->name('destroy');
// Route::get('/edit/{id}', [AdminsController::class,'edit'])->name('edit');

// Resource
Route::resource('/posts', AdminController::class);

require __DIR__.'/auth.php';
