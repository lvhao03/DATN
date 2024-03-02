<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GoogleController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\BlogController;
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
    return view('client.home');
});

Route::get('/shop', [ProductController::class,'shop']);

Route::get('/detail', function () {
    return view('client.detail');
});

Route::get('/variant/{variantID}', [ProductController::class,'getVariant']);



Route::get('/blog_detail/{id}', function () {
    return view('client.blog_detail');
});

Route::get('/blog_detail/{id}', [BlogController::class,'blog_detail']);
Route::get('/blog', [BlogController::class,'blog']);



Route::get('/detail/{id}', [ProductController::class,'detail']);
Route::get('/themvaogio/{idsp}/{soluong}', [ProductController::class,'themvaogio']);
Route::get('/hiengiohang', [ProductController::class,'hiengiohang']);
Route::get('/xoasptronggio/{idsp}', [ProductController::class,'xoasptronggio']);
Route::get('/xoagiohang', [ProductController::class,'xoagiohang']);

Route::get('/about', function () {
    return view('client.about');
});


Route::get('/contact', function () {
    return view('client.contact');
});

Route::get('/services', function () {
    return view('client.services');
});

Route::get('/user', function () {
    if (!\Auth::user()){
        return redirect('/login');
    }
    return view('client.user_profile');
});

Route::get('/cart', function () {
    return view('client.cart');
});

Route::post('/change-info', [CustomerController::class, 'edit']);

Route::get('social/google', [GoogleController::class, 'redirect']);
 
Route::get('social/google/callback', [GoogleController::class, 'googleCallback']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
