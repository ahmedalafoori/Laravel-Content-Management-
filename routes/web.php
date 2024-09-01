<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;

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

// جعل صفحة المنشورات هي الصفحة الرئيسية
Route::get('/', [PostController::class, 'index'])->name('home');

// طرق المنشورات العامة
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// طرق المنشورات المحمية
Route::group(['middleware' => ['auth']], function () {
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

    Route::group(['middleware' => 'check.post.ownership'], function () {
        Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
        Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
        Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    });

    // طريق حذف الوسائط
    Route::delete('media/{media}', [PostController::class, 'destroyMedia'])->name('media.destroy');
});

// هذا الطريق يجب أن يكون بعد '/posts/create' لتجنب التداخل
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// طرق المصادقة
Auth::routes();
