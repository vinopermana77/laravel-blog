<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\ProfileController;

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
Route::get('/', [HomeController::class,'homepage'])->name('homepage');

// Auth admin and user
Route::get('/home', [HomeController::class,'index'])->middleware('auth')->name('home');
Route::get('/post_detail/{id}', [HomeController::class,'postDetail'])->name('postDetail');
Route::get('/create_post', [HomeController::class,'createPost'])->middleware('auth')->name('createPost');
Route::post('/user_post', [HomeController::class,'userPost'])->middleware('auth')->name('userPost');
Route::get('/my_post', [HomeController::class,'myPost'])->middleware('auth')->name('myPost');
Route::get('/edit_post/{id}', [HomeController::class,'edit'])->middleware('auth')->name('edit');
Route::post('/userUpdate/{id}', [HomeController::class,'userUpdate'])->middleware('auth')->name('userUpdate');
Route::post('/destroy/{id}', [HomeController::class,'destroy'])->middleware('auth')->name('destroy');

// Resource Admin
// Route::resource('/posts', AdminController::class)->middleware('admin');
// Route::get('/accept_post', AdminController::class,'accept_post')->middleware('admin');
Route::middleware(['auth','admin'])->group(
    function () {
        Route::get('/index', [AdminController::class,'index'])->name('index');
        Route::get('/create', [AdminController::class,'create'])->name('create');
        Route::post('/store', [AdminController::class,'store'])->name('store');
        Route::get('/edit', [AdminController::class,'edit'])->name('edit');
        Route::post('/update/{id}', [AdminController::class,'update'])->name('update');
        Route::get('/destroy/{id}', [AdminController::class,'destroy'])->name('destroy');
        Route::get('/edit/{id}', [AdminController::class,'edit'])->name('edit');
        Route::get('/edit/{id}', [AdminController::class,'edit'])->name('edit');
        Route::get('/accept_post/{id}', [AdminController::class,'acceptPost'])->name('acceptPost');
        Route::get('/reject_post/{id}', [AdminController::class,'rejectPost'])->name('rejectPost');
    }
);

// Setting Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Create Post
// Route::get('/index', [AdminsController::class,'index'])->name('index');
// Route::get('/create', [AdminsController::class,'create'])->name('create');
// Route::post('/store', [AdminsController::class,'store'])->name('store');
// Route::get('/edit', [AdminsController::class,'edit'])->name('edit');
// Route::post('/update/{id}', [AdminsController::class,'update'])->name('update');
// Route::get('/destroy/{id}', [AdminsController::class,'destroy'])->name('destroy');
// Route::get('/edit/{id}', [AdminsController::class,'edit'])->name('edit');


require __DIR__.'/auth.php';
