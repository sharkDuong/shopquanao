<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminOrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('products', ProductController::class)->only(['index', 'show', 'create']);
Route::post('orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('my-cart', [OrderController::class, 'index'])->name('orders.index');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/products/create', [AdminProductController::class, 'create'])->name('products.create');
    Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [AdminProductController::class, 'update'])->name('products.update');
    Route::get('/products', [AdminProductController::class, 'index'])->name('products.index');
    Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])->name('products.destroy');

    Route::get('/orders/{product}/edit', [AdminProductController::class, 'edit'])->name('orders.edit');
    Route::put('/orders/{product}', [AdminProductController::class, 'update'])->name('orders.update');
    Route::get('/orders', [AdminProductController::class, 'index'])->name('orders.index');
    Route::delete('/orders/{product}', [AdminOrderController::class, 'destroy'])->name('orders.destroy');

});










