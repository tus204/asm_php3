<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\user\ShopController;
use App\Http\Controllers\User\UserController;
use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/account-dashboard', [UserController::class, 'index'])->name('user.index');
    Route::get('/detail-user/{id}',[UserController::class,'show'])->name('user.show');
    Route::delete('/delete_user/{id}',[UserController::class,'destroy'])->name('user.destroy');
    Route::get('/edit-user/{id}',[UserController::class,'edit'])->name('user.edit');
    Route::put('/update_user/{id}',[UserController::class,'update'])->name('user.update');
});

Route::middleware(['auth', AuthAdmin::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('admin/danh_mucs', DanhMucController::class);
    Route::resource('admin/san_phams', SanPhamController::class);
});

// profile, post, product reviews
