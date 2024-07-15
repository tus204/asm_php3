<?php

use App\Http\Controllers\admins\AdminController;
use App\Http\Controllers\clients\ClientController;
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

// Route home
Route::get('/', [ClientController::class, 'index'])->name('clients.home');

// Route admin home
Route::get('/admin', [AdminController::class, 'index'])->name('admins.home');
