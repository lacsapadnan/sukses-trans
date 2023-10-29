<?php

use App\Http\Controllers\ContainerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeliveryOrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('user', UserController::class)->except(['create', 'show']);
    Route::resource('container', ContainerController::class)->except(['create', 'show']);
    Route::resource('product', ProductController::class)->except(['create', 'show']);
    Route::resource('delivery-order', DeliveryOrderController::class);

    // Data Ajax
    Route::get('data/user', [UserController::class, 'data'])->name('user.data');
    Route::get('data/container', [ContainerController::class, 'data'])->name('container.data');
    Route::get('data/product', [ProductController::class, 'data'])->name('product.data');
    Route::get('data/delivery-order', [DeliveryOrderController::class, 'data'])->name('deliveryOrder.data');
});

require __DIR__ . '/auth.php';
