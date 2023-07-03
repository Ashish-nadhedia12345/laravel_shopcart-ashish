<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use Illuminate\Routing\Route as RoutingRoute;
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

Route::get('/', [CategoryController::class, 'index'])->name('root');
Route::get('/home', [CategoryController::class, 'index'])->name('home');
Auth::routes();

Route::get('/category/{category?}', [CategoryController::class, 'index'])->name('category.index');
Route::get('/product/{product}', [ProductController::class, 'index'])->name('product.index');
Route::post('/addcart/{id}', [CartController::class, 'addcart']);
Route::get('/showcart', [CartController::class, 'showcart'])->name('showcart');
Route::get('/delete/{id}', [CartController::class, 'dataDelete']);




Route::group(['middleware', 'auth'], function () {
    Route::get('/address', [AddressController::class, 'index'])->name('address.index');
    Route::get('/address/create', [AddressController::class, 'create'])->name('address.create');;
    Route::post('/address/create', [AddressController::class, 'store'])->name('address.store');;
    Route::delete('/address/delete/{address}', [AddressController::class, 'destroy'])->name('address.delete');
    Route::get('/payment/step1/{order}', [PaymentController::class, 'step1'])->name('payment.step1');
    Route::match(['get','post'],'/payment/response/{order}', [PaymentController::class, 'response'])->name('payment.response');

    Route::get('/order/review', [OrderController::class, 'review'])->name('order.review');
    Route::get('/order/applyCoupon/{order}',[OrderController::class, 'applyCoupon'])->name('order.applyCoupon');
    Route::get('/orderhistory/index', [OrderController::class, 'index'])->name('orderhistory.index');
    Route::get('/orderhistory/invoice/{order}',[OrderController::class, 'invoice'])->name('orderhistory.invoice');
});
