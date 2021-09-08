<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

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

// Route::get('/', function () {return view('welcome');});

Route::get('/', [ProductsController::class, 'index'])->name('landing'); // landing page - straight to business
Route::get('/products/{id}', [ProductsController::class, 'show'])->name('single-product'); // maybe sluggify this for SEO, rather than just having id?

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => ['auth:sanctum', 'verified',]], function () {

    Route::get('/product/create', \App\Http\Livewire\User\ProductsController::class, 'create')->name('create-product');
    Route::get('/product/update/{id}', \App\Http\Livewire\User\ProductsController::class, 'update')->name('update-product');
    Route::get('/product/delete/{id}', \App\Http\Livewire\User\ProductsController::class, 'destroy')->name('delete-product');

});

