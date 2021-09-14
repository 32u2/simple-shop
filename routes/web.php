<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CropImageController;
use App\Http\Livewire\ManageProducts;
use App\Http\Livewire\SingleProduct;
use App\Http\Livewire\UpdateProduct;
use App\Http\Controllers\StripePaymentController;

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

Route::get('/home', function () {return view('welcome');});

Route::get('/', [ProductsController::class, 'index'])->name('landing'); // landing page - straight to business
Route::get('/product/{id}', SingleProduct::class)->name('single-product'); // maybe sluggify this for SEO, rather than just having id?

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => ['auth:sanctum', 'verified',]], function () {

    // normal
    Route::get('/product/create', [ProductsController::class, 'create'])->name('create-product');

    // live
    Route::get('/products', ManageProducts::class)->name('products');
    Route::get('/product/update/{id}', UpdateProduct::class)->name('update-product');
});


