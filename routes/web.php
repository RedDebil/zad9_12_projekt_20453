<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProduktyController;
use App\Http\Controllers\OpinieController;
use App\Http\Controllers\Mod\DashboardController;
use App\Http\Controllers\Mod\ModProduktyController;
use App\Http\Controllers\Mod\ModAdresController;
use App\Http\Controllers\Mod\ModOpinieController;
use App\Http\Controllers\Mod\ModOrderController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminKategoriaController;
use App\Http\Controllers\Admin\AdminKurierzyController;
use App\Http\Controllers\Admin\AdminDostawcaController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/access-denied', function () {
    return view('errors.access-denied');
})->name('access-denied');

Route::middleware(['auth', 'verified'])->group(function () {
    // Zwykły użytkownik
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Moderator (mod)
    Route::middleware(['role:mod'])->group(function () {
        Route::get('/mod/dashboard', [DashboardController::class, 'index'])->name('mod.dashboard');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/{order}/update-status/{status}', [OrderController::class, 'updateStatus'])
    ->name('orders.update-status')
    ->middleware('auth');
    Route::put('/orders/{orderId}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');
    Route::put('/orders/{orderId}/return', [OrderController::class, 'return'])->name('orders.return');

    Route::get('/produkty', [ProduktyController::class, 'index'])->name('produkty.index');
    Route::get('/produkty/{id}', [ProduktyController::class, 'show'])->name('produkty.show');

    Route::post('opinie', [OpinieController::class, 'store'])->name('opinie.store');
    Route::get('/opinie/{id}/edit', [OpinieController::class, 'edit'])->name('opinie.edit');
    Route::put('/opinie/{id}', [OpinieController::class, 'update'])->name('opinie.update');
    Route::delete('/opinie/{id}', [OpinieController::class, 'destroy'])->name('opinie.destroy');
});

Route::middleware(['auth', 'role:mod'])->group(function () {
    Route::get('/mod/dashboard', [DashboardController::class, 'index'])->name('mod.dashboard');

    Route::get('/mod/produkty', [ModProduktyController::class, 'index'])->name('mod.produkty.index');
    Route::get('/mod/produkty/create', [ModProduktyController::class, 'create'])->name('produkty.create');
    Route::post('/mod/produkty', [ModProduktyController::class, 'store'])->name('produkty.store');
    Route::get('/mod/produkty/{produkty}/edit', [ModProduktyController::class, 'edit'])->name('produkty.edit');
    Route::put('/mod/produkty/{produkty}', [ModProduktyController::class, 'update'])->name('produkty.update');

    Route::get('/mod/adres', [ModAdresController::class, 'index'])->name('mod.adres.index');
    Route::get('/mod/adres/create', [ModAdresController::class, 'create'])->name('mod.adres.create');
    Route::post('/mod/adres', [ModAdresController::class, 'store'])->name('mod.adres.store');
    Route::get('/mod/adres/{adres}/edit', [ModAdresController::class, 'edit'])->name('mod.adres.edit');
    Route::put('/mod/adres/{adres}', [ModAdresController::class, 'update'])->name('mod.adres.update');
    Route::delete('/mod/adres/{adres}', [ModAdresController::class, 'destroy'])->name('mod.adres.destroy');

    Route::get('/opinie/{produkt}', [ModOpinieController::class, 'index'])->name('opinie.index');
    Route::get('/mod/opinie/{produktId}', [ModOpinieController::class, 'index'])->name('mod.opinie.index');

    Route::get('/mod/orders', [ModOrderController::class, 'index'])->name('mod.orders.index');
    Route::delete('/mod/opinie/{id}', [ModOpinieController::class, 'destroy'])->name('mod.opinie.destroy');

    Route::post('/mod/orders/{zamowienie}/status', [ModOrderController::class, 'updateStatus'])->name('mod.orders.updateStatus');

});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('users', AdminUserController::class);
    Route::resource('kategorie', AdminKategoriaController::class);
    Route::resource('kurierzy', AdminKurierzyController::class);
    Route::resource('dostawcy', AdminDostawcaController::class);
});

require __DIR__.'/auth.php';
