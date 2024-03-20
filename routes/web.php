<?php

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Guest\HomeController as GuestHomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', GuestHomeController::class)->name('guest.home');

Route::prefix('/admin')->name('admin.')->middleware('auth')->group(function () {
    //Rotte Admin home
    Route::get('', AdminHomeController::class)->name('home');
    
    //Rotte admin post
    Route::resource('posts', PostController::class);
});


//Rotte Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
