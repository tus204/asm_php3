<?php

use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\ShopController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\AddressController;
use App\Http\Controllers\Admin\BaiVietController;
use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\Client\LienHeController;
use App\Http\Controllers\User\BaiVietController as UserBaiVietController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/{slug}', [ShopController::class, 'product_detail'])->name('product.detail');

Route::get('/posts', [UserBaiVietController::class, 'index'])->name('post.index');
Route::get('/post/{slug}', [UserBaiVietController::class, 'post_detail'])->name('post.detail');
//Liên hệ và thông tin trang web
Route::get('/contact', [LienHeController::class, 'index'])->name('client.contact');
Route::post('/contact', [LienHeController::class, 'store'])->name('client.postContact');
Route::get('/admin/lien_hes', [LienHeController::class, 'admin_contact'])->name('admin.contact');
Route::get('/about',[LienHeController::class,'about'])->name('client.about');

Route::middleware(['auth'])->group(function () {
    Route::get('/account-dashboard', [UserController::class, 'index'])->name('user.index');
    Route::resource('/address', AddressController::class);
});

Route::middleware(['auth', AuthAdmin::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('admin/danh_mucs', DanhMucController::class);
    Route::resource('admin/san_phams', SanPhamController::class);
    Route::resource('admin/bai_viets', BaiVietController::class);
});

// profile, post, product reviews
