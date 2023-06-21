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

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Modules\AdminPanel\Http\Controllers\CategoryController;
use Modules\AdminPanel\Http\Controllers\PageController;

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
     Route::get('/page',[PageController::class,'index'])->name('admin.page.index');
     //create
     Route::get('/page/create',[PageController::class,'create'])->name('admin.page.create');
     Route::post('/page/create',[PageController::class,'store'])->name('admin.page.store');
     //edit
     Route::get('/page/edit/{page}',[PageController::class,'edit'])->name('admin.page.edit');
     Route::patch('/page/edit/{page}',[PageController::class,'update'])->name('admin.page.update');
     //delete
     Route::delete('/page/delete/{page}',[PageController::class,'destroy'])->name('admin.page.delete');

});
