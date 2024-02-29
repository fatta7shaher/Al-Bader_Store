<?php

use App\Http\Controllers\AddCartController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Auth::routes();

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::group([
            'middleware' => ['is_admin', 'auth'],
            'prefix' => 'admin',

        ], function () {

            Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
            Route::resource('/categories', CategoryController::class);
            Route::resource('/products', ProductController::class);
        });


        // Route::get('/', function () {
        //     return view('welcome');
        // });

        Route::get('/', [WebsiteController::class, 'index']);
        Route::get('/categories', [WebsiteController::class, 'getCategories'])->name('get_categories');
        Route::get('/category/{slug}', [WebsiteController::class, 'getCategoryBySlug'])->name('get_category_slug');
        Route::get('/category/{category_slug}/{product_slug}', [WebsiteController::class, 'getProductBySlug'])->name('get_product_slug');
        Route::post('/product/add_to_cart', [AddCartController::class, 'addToCart'])->name('product.addToCart');

        Route::group([
            'middleware' => ['auth']
        ], function () {
            Route::get('cart', [AddCartController::class, 'index'])->name('cart.index');
            Route::delete('cart/destroy/{id}', [AddCartController::class, 'destroy'])->name('cart.destroy');
            Route::post('cart/update', [AddCartController::class, 'update'])->name('cart.update');
            Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout.index');
        });
    }
);
