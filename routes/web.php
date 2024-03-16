<?php

use App\Http\Controllers\Admin\ArticleController as ArticleAdminController;
use App\Http\Controllers\Admin\BlogController as BlogAdminController;
use App\Http\Controllers\Admin\CategoryController as CategoryAdminController;
use App\Http\Controllers\Admin\CommentController as CommentAdminController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\HomeController as HomeAdminController;
use App\Http\Controllers\Admin\OrderController as OrderAdminController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\StaffController as StaffAdminController;
use App\Http\Controllers\Admin\VariantController as VariantAdminController;
use App\Http\Controllers\Admin\VoucherController as VoucherAdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::middleware(['checkauth','checkadmin'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(
        function () {
            Route::get('/', [HomeAdminController::class, 'index'])->name('home');

            Route::prefix('product')->group(
                function () {
                    Route::get('/', [AdminProductController::class, 'index'])->name('product');
                    Route::get('create/', [AdminProductController::class, 'create'])->name('createProduct');
                    Route::post('create/', [AdminProductController::class, 'create_'])->name('createProduct_');
                    Route::get('edit/{id?}', [AdminProductController::class, 'edit'])->name('editProduct')->where(['id' => '[0-9]+']);
                    Route::post('edit', [AdminProductController::class, 'edit_'])->name('editProduct_');
                    Route::get('delete/{id?}', [AdminProductController::class, 'delete'])->name('deleteProduct')->where(['id' => '[0-9]+']);
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
            Route::prefix('user')->group(
                function () {
                    Route::get('/', [AdminUserController::class, 'index'])->name('user');
                    Route::get('view_add', [AdminUserController::class, 'view_add'])->name('addUser');
                    Route::post('add', [AdminUserController::class, 'add'])->name('postAddUser');
                    Route::get('view_edit/{id?}', [AdminUserController::class, 'view_edit'])->name('editUser')->where(['id' => '[0-9]+']);
                    Route::put('edit/{id}', [AdminUserController::class, 'edit'])->name('postEditUser');
                    Route::get('delete/{id?}', [AdminUserController::class, 'delete'])->name('deleteUser')->where(['id' => '[0-9]+']);
                }
            );
            Route::prefix('order')->group(
                function () {
                    Route::get('/', [OrderAdminController::class, 'index'])->name('order');
                    Route::get('edit/{id?}', [OrderAdminController::class, 'index'])->name('editOrder')->where(['id' => '[0-9]+']);
                    Route::put('edit', [OrderAdminController::class, 'index'])->name('postEditOrder');
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
                    Route::get('trash', [CommentAdminController::class, 'showTrash'])->name('trashComment');
                    Route::get('restore/{id?}', [CommentAdminController::class, 'restore'])->name('restoreComment');
                    Route::get('forceDelete/{id?}', [CommentAdminController::class, 'forceDelete'])->name('forceDeleteComment');
                }
            );
            Route::prefix('voucher')->group(
                function () {
                    Route::get('/', [VoucherAdminController::class, 'index'])->name('voucher');
                    Route::get('add', [VoucherAdminController::class, 'index'])->name('addVoucher');
                    Route::post('add', [VoucherAdminController::class, 'index'])->name('postAddVoucher');
                    Route::get('edit/{id?}', [VoucherAdminController::class, 'index'])->name('editVoucher')->where(['id' => '[0-9]+']);
                    Route::put('edit', [VoucherAdminController::class, 'index'])->name('postEditVoucher');
                    Route::get('delete/{id?}', [VoucherAdminController::class, 'index'])->name('deleteVoucher')->where(['id' => '[0-9]+']);
                }
            );
            Route::prefix('staff')->group(
                function () {
                    Route::get('/', [StaffAdminController::class, 'index'])->name('staff');
                    Route::get('create', [StaffAdminController::class, 'create'])->name('createStaff');
                    Route::post('create', [StaffAdminController::class, 'create_'])->name('createStaff_');
                    Route::get('edit/{id?}', [StaffAdminController::class, 'edit'])->name('editStaff')->where(['id' => '[0-9]+']);
                    Route::post('edit', [StaffAdminController::class, 'edit_'])->name('editStaff_');
                    Route::get('delete/{id?}', [StaffAdminController::class, 'delete'])->name('deleteStaff')->where(['id' => '[0-9]+']);
                    Route::get('trash', [StaffAdminController::class, 'showTrash'])->name('trashStaff');
                    Route::get('restore/{id?}', [StaffAdminController::class, 'restore'])->name('restoreStaff');
                    Route::get('forceDelete/{id?}', [StaffAdminController::class, 'forceDelete'])->name('forceDeleteStaff');
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
                    Route::get('view_add', [CategoryAdminController::class, 'view_add'])->name('addCategory');
                    Route::post('add', [CategoryAdminController::class, 'add'])->name('postAddCategory');
                    Route::get('view_edit/{id}', [CategoryAdminController::class, 'view_edit'])->name('editCategory')->where(['id' => '[0-9]+']);
                    Route::put('edit/{id}', [CategoryAdminController::class, 'edit'])->name('postEditCategory');
                    Route::get('delete/{id?}', [CategoryAdminController::class, 'delete'])->name('deleteCategory')->where(['id' => '[0-9]+']);
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

Route::get('/variant/{variantID}', [ProductController::class, 'getVariant']);

Route::get('/blog_detail/{id}', [BlogController::class,'blog_detail']);
Route::get('/blog', [BlogController::class,'blog']);


Route::get('/detail/{id}', [ProductController::class, 'detail']);
Route::get('/addCart/{idsp}/{soluong}/{idbt}', [ProductController::class,'addCart']);
Route::get('/cart', [ProductController::class,'cart']);
Route::get('/deteleCart/{idsp}', [ProductController::class,'deteleCart']);
Route::get('/xoagiohang', [ProductController::class, 'xoagiohang']);

Route::get('/about', function () {
    return view('client.about');
});

Route::get('/blog', function () {
    return view('client.blog');
});

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

Route::post('/change-info', [UserController::class, 'edit']);

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
