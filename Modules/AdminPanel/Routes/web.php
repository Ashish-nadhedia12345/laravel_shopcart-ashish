<?php

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

use App\Http\Controllers\ProductController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Modules\AdminPanel\Http\Controllers\CategoryController;


Route::group([
    'prefix' => 'adminpanel',
    'middleware' => ['auth','can:isAdmin']
],
function() {
    Route::get('/', 'AdminPanelController@index');
    //all category route
    Route::get('/category',[CategoryController::class,'index'])->name('admin.category.index');
    //create
    Route::get('/category/create',[CategoryController::class,'create'])->name('admin.category.create');
    Route::post('/category/create',[CategoryController::class,'store'])->name('admin.category.store');
    //edit
    Route::get('/category/edit/{category}',[CategoryController::class,'edit'])->name('admin.category.edit');
    Route::patch('/category/edit/{category}',[CategoryController::class,'update'])->name('admin.category.update');
    //delete
    Route::delete('/category/delete/{category}',[CategoryController::class,'destroy'])->name('admin.category.delete');


     //all page route
     Route::get('/product',[ProductController::class,'index'])->name('admin.product.index');
     //create
     Route::get('/product/create',[ProductController::class,'create'])->name('admin.product.create');
     Route::post('/product/create',[ProductController::class,'store'])->name('admin.product.store');
     //edit
     Route::get('/product/edit/{product}',[ProductController::class,'edit'])->name('admin.product.edit');
     Route::patch('/product/edit/{product}',[ProductController::class,'update'])->name('admin.product.update');
     //delete
     Route::delete('/product/delete/{product}',[ProductController::class,'destroy'])->name('admin.product.delete');

});
