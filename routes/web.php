<?php

use App\Blog\Controllers\CommentArticle\CommentArticleController;
use App\Blog\Controllers\ListPublishedArticlesController;
use App\Blog\Controllers\ShowArticleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::post('/articles/{article}/comment', CommentArticleController::class)->name('article.comment');
Route::get('/articles/{article}', ShowArticleController::class)->name('article.show');
Route::get('/articles', ListPublishedArticlesController::class)->name('article.index');


Route::view('/', 'homepage')->name('homepage');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
