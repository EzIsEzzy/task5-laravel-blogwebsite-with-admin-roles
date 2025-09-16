<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('');
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
    Route::get('dashboard',[PostController::class, 'index_dashboard'])->name('posts.dashboard');
    Route::get('posts',[PostController::class,'index_post'])->name('posts.index');
    Route::get('posts/create',[PostController::class, 'create'])->name('posts.create');
    Route::get('posts/show/{post}',[PostController::class,'show'])->name('posts.show');
    Route::post('posts/store',[PostController::class, 'store'])->name('posts.store');
    Route::get('posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit');
    Route::put('posts/{post}/update',[PostController::class,'update'])->name('posts.update');
    Route::delete('posts/{post}/delete',[PostController::class,'destroy'])->name('posts.destroy');

    //Category Routes
    Route::get('categories',[CategoryController::class,'index'])->name('categories.index');
    Route::get('categories/create',[CategoryController::class, 'create'])->name('categories.create');
    Route::get('categories/show',[CategoryController::class,'show'])->name('categories.show');
    Route::post('categories/store',[CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/{category}/edit',[CategoryController::class,'edit'])->name('categories.edit');
    Route::put('categories/{category}/update',[CategoryController::class,'update'])->name('categories.update');
    Route::delete('categories/{category}/delete',[CategoryController::class,'destroy'])->name('categories.destroy');

});


require __DIR__.'/auth.php';
