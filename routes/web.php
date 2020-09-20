<?php

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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Post
Route::get('/posts', [App\Http\Controllers\PostController::class,'index'])->name('posts');
Route::get('/post', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
Route::get('/article/{id?}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');
Route::post('/post', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::post('/post/comment/store', [App\Http\Controllers\PostController::class, 'comment'])->name('post.comment');

//Product
Route::get('/products', [App\Http\Controllers\ProductController::class,'index'])->name('products');
Route::get('/product', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
Route::get('/article_product/{id?}', [App\Http\Controllers\ProductController::class, 'show'])->name('product.show');
Route::post('/product', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
Route::post('/product/comment/store', [App\Http\Controllers\ProductController::class, 'comment'])->name('product.comment');


