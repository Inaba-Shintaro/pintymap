<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login/guest', [LoginController::class, 'guestLogin']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('post.index');
    Route::resource('post', PostController::class, ['only' => ['create', 'store', 'show', 'edit', 'update', 'destroy']]);

    Route::post('/post/{post_id}/comment', [CommentController::class, 'store'])->name('comment.store');
    Route::delete('/comment/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');

    Route::get('/mypage', [UserController::class, 'mypage'])->name('mypage');
    Route::get('/mypage/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/mypage/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/mypage/{user}', [UserController::class, 'destroy'])->name('user.destroy');
});
