<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['admin-check','auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Admin Routes
Route::prefix('/admin')->middleware(['admin-check','auth'])->group(function () {
    
    //Post Routes
    Route::get('dashboard',[PostController::class, 'index_dashboard']);
    Route::get('posts',[PostController::class,'index_post']);
    Route::get('posts/create',[PostController::class, 'create']);
    Route::get('posts/show',[PostController::class,'show']);
    Route::post('posts/store',[PostController::class, 'store']);
    Route::get('posts/{post}/edit',[PostController::class,'edit']);
    Route::put('posts/{post}/update',[PostController::class,'update']);
    Route::delete('posts/{post}/delete',[PostController::class,'destroy']);

    //Category Routes
    Route::get('categories',[CategoryController::class,'index']);
    Route::get('categories/create',[CategoryController::class, 'create']);
    Route::get('categories/show',[CategoryController::class,'show']);
    Route::post('categories/store',[CategoryController::class, 'store']);
    Route::get('categories/{category}/edit',[CategoryController::class,'edit']);
    Route::put('categories/{category}/update',[CategoryController::class,'update']);
    Route::delete('categories/{category}/delete',[CategoryController::class,'destroy']);

});


require __DIR__.'/auth.php';
