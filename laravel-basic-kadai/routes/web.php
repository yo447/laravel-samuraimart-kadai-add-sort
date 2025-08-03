<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ResponseController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/posts', function () {
    return view('posts.index');
});

Route::get('/posts', [PostController::class, 'index']);

Route::post('/posts/confirm', [PostController::class, 'confirm'])->name('posts.confirm');

Route::get('/posts/create', [PostController::class, 'create'])->middleware('auth');

//これがいらなかったRoute::get('/posts', [PostController::class, 'create']);

Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store')->middleware('auth');

Route::get('/vendors/{id}', [VendorController::class, 'show']);

//======== 後略 ========

Route::get('/posts/{id}', [PostController::class, 'show']);

Route::get('/posts_table_dummy/{id}', [PostController::class, 'show']);






Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/create', [ProductController::class, 'create']);

Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');

Route::get('/products/{id}', [ProductController::class, 'show']);

Route::get('/vendors/create', [VendorController::class, 'create'])->middleware('auth');

Route::post('/vendors/store', [VendorController::class, 'store'])->name('vendors.store')->middleware('auth');

Route::get('/vendors/{id}', [VendorController::class, 'show']);


Route::get('/requests/create', [RequestController::class, 'create']);

Route::post('/requests/confirm', [RequestController::class, 'confirm'])->name('requests.confirm');

Route::get('/responses', [ResponseController::class, 'index']);
