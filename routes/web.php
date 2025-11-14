<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');
Route::get('/categories', [CategoryController::class, 'index'])->name('show-category');
Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('comment');
Route::post('commnet/{comment}/delete', [CommentController::class, 'destroy'])->name('delete-comment');
Route::get('/edit/{post}', [PostController::class, 'edit'])->name('edit-post')->middleware('auth');
Route::post('/edit/{post}/save', [PostController::class, 'update'])->name('save-edit')->middleware('auth');
Route::post('/edit/{post}/delete', [PostController::class, 'destroy'])->name('delete-post')->middleware('auth');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::prefix('admin')->group(function(){
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');

    Route::get('/posts', [PostController::class, 'create'])->name('posts');
    Route::get('/categories', [CategoryController::class, 'create'])->name('add-category');

    Route::post('/categories/create', [CategoryController::class, 'store'])->name('create-category');
    Route::post('/posts/create', [PostController::class, 'store'])->name('create-post');
})->middleware(['auth', 'verified']);