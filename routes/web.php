<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
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

Route::get('/',[CategoryController::class,'index'])->name('root');
Route::get('/home',[CategoryController::class,'index'])->name('home');
Auth::routes();

Route::get('/category/{category}', [CategoryController::class, 'index'])->name('category.index');
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/page/{page}', [PageController::class, 'index'])->name('page.index');
