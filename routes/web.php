<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\WebpageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\AdminorderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/checkout', function () {
    return view('pages.checkout');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::get('/admin/dashboard', [AdminController::class, 'index']) ->name('admin.dashboard');;
 Route::get('/Banner/index',[ BannerController::class,'index'])->name('banner.index');
Route::get('/Banner/create',[ BannerController::class,'create'])->name('banner.create');
Route::post('/Banner/store',[ BannerController::class,'store'])->name('banner.store');
Route::get('/Banner/edit{id}',[ BannerController::class,'edit'])->name('banner.edit');
Route::post('/Banner/update{id}',[ BannerController::class,'update'])->name('banner.update');

Route::get('/Category/index',[ CategoryController::class,'index'])->name('cat.index');
Route::get('/Category/create',[ CategoryController::class,'create'])->name('cat.create');
Route::post('/Category/store',[ CategoryController::class,'store'])->name('cat.store');
Route::get('/Category/edit{id}',[ CategoryController::class,'edit'])->name('cat.edit');
Route::post('/Category/update{id}',[ CategoryController::class,'update'])->name('cat.update');
Route::get('/Category/delete/{id}',[ CategoryController::class,'delete'])->name('cat.delete');;

Route::resource('/product', ProductsController::class);
Route::get('/product/delete/{id}',[ ProductsController::class,'delete'])->name('product.delete');;

 Route::get('/orders', [AdminorderController::class, 'index'])->name('admin.orders');
 Route::get('/orders/{id}', [AdminorderController::class, 'show']) ->name('admin.orders.show');
 Route::put('/orders/{id}', [AdminorderController::class, 'update'])->name('admin.orders.update');

 Route::get('/customers', [CustomerController::class, 'index'])->name('admin.customers');
 Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('admin.customers.show');

});




Route::get('/shop/product/{id}', [WebpageController::class, 'showProduct']) ->name('shop.product.show');





Route::get('/home', [WebpageController::class, 'home'])->name('home');

Route::get('/shop', [WebpageController::class, 'shop'])->name('shop');


Route::post('/cart/add', [CartsController::class,'store']) ->middleware('auth') ->name('cart.store');
Route::get('/cart', [CartsController::class, 'index'])->middleware('auth')->name('cart.index');
Route::get('/cart/delete/{id}',[ CartsController::class,'delete'])->name('cart.delete');;

Route::middleware('auth')->group(function () {

    Route::get('/checkout', [CheckoutController::class, 'index'])  ->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store']) ->name('checkout.store');


    Route::get('/my-orders', [OrdersController::class, 'index'])->name('orders.index');
    Route::get('/my-orders/{id}', [OrdersController::class, 'show']) ->name('orders.show');
});

require __DIR__.'/auth.php';
