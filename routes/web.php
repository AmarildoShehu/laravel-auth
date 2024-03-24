<?php

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Guest\HomeController as GuestHomeController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Guest\PostController as GuestPostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', GuestHomeController::class)->name('guest.home');

Route::get('/posts/{slug}', [GuestPostController::class, 'show'])->name('guest.posts.show');


Route::prefix('/admin')->name('admin.')->middleware('auth')->group(function () {
    //Rotte Admin home
    Route::get('', AdminHomeController::class)->name('home');
    
    //Rotte admin post

    Route::get('/pos')
    Route::resource('posts', AdminPostController::class);
});


//Rotte Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
