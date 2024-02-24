<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GoogleController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;



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

Route::get('/shop', function () {
    return view('client.shop');
});

Route::get('/detail', function () {
    return view('client.detail');
});
Route::get('/detail/{id}', [ProductController::class,'detail']);
Route::get('/themvaogio/{idsp}/{soluong}', [ProductController::class,'themvaogio']);
Route::get('/hiengiohang', [ProductController::class,'hiengiohang']);
Route::get('/xoasptronggio/{idsp}', [ProductController::class,'xoasptronggio']);
Route::get('/xoagiohang', [ProductController::class,'xoagiohang']);

/* Trang shop */
Route::get('/',[ShopController::class,'all_products_cate'])->name('all.productscate');
Route::get('/{idloai}',[ShopController::class,'all_products_theoloai'])->name('all.productscate');
Route::get('/search-product',[ShopController::class,'search_products'])->name('search.products');
Route::get('/sort-by',[ShopController::class,'sort_by'])->name('sort.by');
/*end trang shop*/


Route::get('/about', function () {
    return view('client.about');
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
