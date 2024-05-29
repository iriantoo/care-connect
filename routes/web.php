<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('education', [App\Http\Controllers\HomeController::class, 'education'])->name('education');

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('admin/index', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    Route::get('admin/forums', [App\Http\Controllers\ForumController::class, 'adminIndex'])->name('forums.adminIndex');
    Route::get('admin/forums/edit/{id}', [App\Http\Controllers\ForumController::class, 'adminEdit'])->name('forums.adminEdit');
    Route::put('admin/forums/update/{id}', [App\Http\Controllers\ForumController::class, 'adminUpdate'])->name('forums.adminUpdate');
    Route::post('admin/forums/confirm', [App\Http\Controllers\ForumController::class, 'adminConfirm'])->name('forums.adminConfirm');
});

Route::get('forums/list', [App\Http\Controllers\ForumController::class, 'list'])->name('forums.list');
Route::resource('forums', App\Http\Controllers\ForumController::class);
Route::get('comments/create/{id_forum}', [App\Http\Controllers\CommentController::class, 'create'])->name('comments.create');
Route::post('comments/store', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');