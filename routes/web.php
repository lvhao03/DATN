<?php

use App\Http\Controllers\Admin\ArticleController as ArticleAdminController;
use App\Http\Controllers\Admin\BlogController as BlogAdminController;
use App\Http\Controllers\Admin\CategoryController as CategoryAdminController;
use App\Http\Controllers\Admin\CommentController as CommentAdminController;
use App\Http\Controllers\Admin\CustomerController as AdminCustomerController;
use App\Http\Controllers\Admin\HomeController as HomeAdminController;
use App\Http\Controllers\Admin\OrderController as OrderAdminController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\StaffController as StaffAdminController;
use App\Http\Controllers\Admin\VariantController as VariantAdminController;
use App\Http\Controllers\Admin\VoucherController as VoucherAdminController;

use App\Http\Controllers\PaymentController;
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
})->name('home');

Route::middleware('checkadmin')->group(function () {
    Route::prefix('admin')->name('admin.')->group(
        function () {
            Route::get('/', [HomeAdminController::class, 'index'])->name('home');

            Route::prefix('product')->group(
                function () {
                    Route::get('/', [AdminProductController::class, 'index'])->name('product');
                    Route::get('add', [AdminProductController::class, 'index'])->name('addProduct');
                    Route::post('add', [AdminProductController::class, 'index'])->name('postAddProduct');
                    Route::get('edit/{id?}', [AdminProductController::class, 'index'])->name('editProduct')->where(['id' => '[0-9]+']);
                    Route::put('edit', [AdminProductController::class, 'index'])->name('postEditProduct');
                    Route::get('delete/{id?}', [AdminProductController::class, 'index'])->name('deleteProduct')->where(['id' => '[0-9]+']);
                }
            );
            Route::prefix('variant')->group(
                function () {
                    Route::get('/', [VariantAdminController::class, 'index'])->name('variant');
                    Route::get('add', [VariantAdminController::class, 'index'])->name('addVariant');
                    Route::post('add', [VariantAdminController::class, 'index'])->name('postAddVariant');
                    Route::get('edit/{id?}', [VariantAdminController::class, 'index'])->name('editVariant')->where(['id' => '[0-9]+']);
                    Route::put('edit', [VariantAdminController::class, 'index'])->name('postEditVariant');
                    Route::get('delete/{id?}', [VariantAdminController::class, 'index'])->name('deleteVariant')->where(['id' => '[0-9]+']);
                }
            );
            Route::prefix('customer')->group(
                function () {
                    Route::get('/', [AdminCustomerController::class, 'index'])->name('customer');
                    Route::get('add', [AdminCustomerController::class, 'index'])->name('addCustomer');
                    Route::post('add', [AdminCustomerController::class, 'index'])->name('postAddCustomer');
                    Route::get('edit/{id?}', [AdminCustomerController::class, 'index'])->name('editCustomer')->where(['id' => '[0-9]+']);
                    Route::put('edit', [AdminCustomerController::class, 'index'])->name('postEditCustomer');
                    Route::get('delete/{id?}', [AdminCustomerController::class, 'index'])->name('deleteCustomer')->where(['id' => '[0-9]+']);
                }
            );
            Route::prefix('order')->group(
                function () {
                    Route::get('/', [OrderAdminController::class, 'index'])->name('order');
                    Route::get('view/{id?}', [OrderAdminController::class, 'view'])->name('viewOrder')->where(['id' => '[0-9]+']);
                    Route::get('edit/{id?}', [OrderAdminController::class, 'edit'])->name('editOrder')->where(['id' => '[0-9]+']);
                    Route::post('edit/', [OrderAdminController::class, 'edit__'])->name('postEditOrder__');

                }
            );
            Route::prefix('comment')->group(
                function () {
                    Route::get('/', [CommentAdminController::class, 'index'])->name('comment');
                    Route::get('create/', [CommentAdminController::class, 'create'])->name('createComment');
                    Route::post('create/', [CommentAdminController::class, 'create_'])->name('createComment_');
                    Route::get('edit/{id?}', [CommentAdminController::class, 'edit'])->name('editComment')->where(['id' => '[0-9]+']);
                    Route::post('edit/', [CommentAdminController::class, 'edit_'])->name('editComment_');
                    Route::get('delete/{id?}', [CommentAdminController::class, 'delete'])->name('deleteComment')->where(['id' => '[0-9]+']);
                }
            );
            Route::prefix('voucher')->group(
                function () {
                    Route::get('/', [VoucherAdminController::class, 'index'])->name('voucher');
                    Route::get('list', [VoucherAdminController::class, 'type_voucher'])->name('typeVoucher');
                    Route::get('add', [VoucherAdminController::class, 'add_voucher'])->name('addVoucher');
                    Route::post('create', [VoucherAdminController::class, 'create_'])->name('createVoucherType_');
                    Route::post('create_voucher', [VoucherAdminController::class, 'create_voucher_'])->name('createVoucher_');
                    // Route::post('add', [VoucherAdminController::class, 'add_voucher__'])->name('postAddVoucher');
                    Route::get('delete/{id?}', [VoucherAdminController::class, 'delete'])->name('deleteVoucher')->where(['id' => '[0-9]+']);
                    Route::get('delete_voucher/{id?}', [VoucherAdminController::class, 'delete_voucher'])->name('deleteVoucher_')->where(['id' => '[0-9]+']);

                    
                    Route::get('edit_type_voucher/{id?}', [VoucherAdminController::class, 'edit_type_voucher'])->name('editTypeVoucher')->where(['id' => '[0-9]+']);
                    Route::post('edit_type_voucher/', [VoucherAdminController::class, 'edit_type_voucher__'])->name('edit_type_voucher__');
                    Route::get('edit_voucher/{id?}', [VoucherAdminController::class, 'edit_voucher'])->name('editVoucher')->where(['id' => '[0-9]+']);
                    Route::post('edit_voucher/', [VoucherAdminController::class, 'edit_voucher__'])->name('edit_voucher__');
                  
                }
            );
            Route::prefix('staff')->group(
                function () {
                    Route::get('/', [StaffAdminController::class, 'index'])->name('staff');
                    Route::get('add', [StaffAdminController::class, 'index'])->name('addStaff');
                    Route::post('add', [StaffAdminController::class, 'index'])->name('postAddStaff');
                    Route::get('edit/{id?}', [StaffAdminController::class, 'index'])->name('editStaff')->where(['id' => '[0-9]+']);
                    Route::put('edit', [StaffAdminController::class, 'index'])->name('postEditStaff');
                    Route::get('delete/{id?}', [StaffAdminController::class, 'index'])->name('deleteStaff')->where(['id' => '[0-9]+']);
                }
            );
            Route::prefix('blog')->group(
                function () {
                    Route::get('/', [BlogAdminController::class, 'index'])->name('blog');
                    Route::get('add', [BlogAdminController::class, 'index'])->name('addBlog');
                    Route::post('add', [BlogAdminController::class, 'index'])->name('postAddBlog');
                    Route::get('edit/{id?}', [BlogAdminController::class, 'index'])->name('editBlog')->where(['id' => '[0-9]+']);
                    Route::put('edit', [BlogAdminController::class, 'index'])->name('postEditBlog');
                    Route::get('delete/{id?}', [BlogAdminController::class, 'index'])->name('deleteBlog')->where(['id' => '[0-9]+']);
                }
            );
            // Route::prefix('article')->group(
            //     function () {
            //         Route::get('/', [ArticleAdminController::class, 'index'])->name('article');
            //     }
            // );
            Route::prefix('category')->group(
                function () {
                    Route::get('/', [CategoryAdminController::class, 'index'])->name('category');
                    Route::get('add', [CategoryAdminController::class, 'index'])->name('addCategory');
                    Route::post('add', [CategoryAdminController::class, 'index'])->name('postAddCategory');
                    Route::get('edit/{id?}', [CategoryAdminController::class, 'index'])->name('editCategory')->where(['id' => '[0-9]+']);
                    Route::put('edit', [CategoryAdminController::class, 'index'])->name('postEditCategory');
                    Route::get('delete/{id?}', [CategoryAdminController::class, 'index'])->name('deleteCategory')->where(['id' => '[0-9]+']);
                }
            );

        }
    );
});

//VNPAY
Route::get('/example', [PaymentController::class, 'index']);
Route::post('/vnpay', [PaymentController::class, 'payWithVNPAY'])->name('payWithVNPAY');
Route::get('/vnpay/check', [PaymentController::class, 'checkPayVNPAY'])->name('checkPayVNPAY');
//END VNPAY









Route::get('/shop', [ProductController::class, 'shop']);

Route::get('/detail', function () {
    return view('client.detail');
});


Route::get('/contact', function () {
    return view('client.contact');
});

Route::get('/variant/{variantID}', [ProductController::class, 'getVariant']);




Route::get('/detail/{id}', [ProductController::class, 'detail']);
Route::get('/themvaogio/{idsp}/{soluong}', [ProductController::class, 'themvaogio']);
Route::get('/hiengiohang', [ProductController::class, 'hiengiohang']);
Route::get('/xoasptronggio/{idsp}', [ProductController::class, 'xoasptronggio']);
Route::get('/xoagiohang', [ProductController::class, 'xoagiohang']);

Route::get('/about', function () {
    return view('client.about');
});

Route::get('/blog_detail/{id}', [BlogController::class,'blog_detail']);
Route::get('/blog', [BlogController::class,'blog']);

Route::get('/services', function () {
    return view('client.services');
});

Route::get('/user', function () {
    if (!\Illuminate\Support\Facades\Auth::user()) {
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

require __DIR__ . '/auth.php';
