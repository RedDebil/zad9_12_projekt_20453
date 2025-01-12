<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProduktyController;
use App\Http\Controllers\OpinieController;
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
});



require __DIR__.'/auth.php';
