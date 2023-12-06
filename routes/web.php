<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PemesananController;

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

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/', [AuthController::class, 'login']);

Route::get('/regist', [AuthController::class, 'regist'])->name('regist');
Route::post('/regist', [AuthController::class, 'store']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('/produk', ProdukController::class);

Route::middleware(['auth', 'userAkses:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::resource('/pemesanan', PemesananController::class);
    Route::put('/pemesanan', [PemesananController::class, 'updateStatus'])->name('pemesanan.updateStatus');

    Route::get('/admin/master_data/admin', [UserController::class, 'adminIndex'])->name('data_admin');
    Route::get('/admin/master_data/pembeli', [UserController::class, 'pembeliIndex'])->name('data_pembeli');

    Route::delete('/admin/master_data/data_admin/{user}', [UserController::class, 'destroy'])->name('admin.destroy');
    Route::delete('/admin/master_data/data_pembeli/{user}', [UserController::class, 'destroy'])->name('pembeli.destroy');

    Route::post('/admin/master_data/data_{role}', [UserController::class, 'store'])->name('user.store')->where('role', 'admin|pembeli');
    Route::put('/admin/master_data/data_admin/{user}', [UserController::class, 'update'])->name('admin.update');
    Route::put('/admin/master_data/data_pembeli/{user}', [UserController::class, 'update'])->name('pembeli.update');
});

Route::middleware(['auth', 'userAkses:pembeli'])->group(function () {
    Route::get('/home', [PembeliController::class, 'index'])->name('home');
    Route::get('/shop', [PembeliController::class, 'shop'])->name('shop');
    Route::post('/shop', [PembeliController::class, 'filterByPrice'])->name('pembeli.filterByPrice');


    Route::resource('/keranjang', KeranjangController::class);

    Route::get('/pembeli/pemesanan/{id}', [PembeliController::class, 'pembeliPemesanan'])->name('pembeli.pemesanan');

    Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'prosesCheckout'])->name('proses.checkout');

    Route::get('/payment/{pemesananId}', [CheckoutController::class, 'pendingPayment'])->name('pending-payment');

    Route::get('/checkout-success/{transaction}', [CheckoutController::class, 'success'])->name('checkout-success');
});
