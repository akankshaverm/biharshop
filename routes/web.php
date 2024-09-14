<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Models\Address;
use Illuminate\Support\Facades\Route;

//public / guest routes
Route::get("/", [HomeController::class, "index"])->name('homepage');


//User routes
Route::prefix("user")->group(function () {});

Route::prefix("admin")->group(function () {

    Route::get("/", [AdminController::class, "dashboard"])->name("admin.dashboard");
    Route::resources([
        'category' => CategoryController::class,
        'products' => ProductController::class,
    ]);
});

Route::prefix("auth")->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::match(["get", "post"], "/login", "login")->name("login");
        Route::match(["get", "post"], "/register", "register")->name("auth.register");
        Route::get("/logout", "logout")->name("auth.logout");
    });
});

Route::get("/add-to-cart/{product_slug}", [OrderController::class, "addToCart"])->name("addToCart")->middleware('auth');

Route::get("/remove-from-cart/{product_slug}", [OrderController::class, "removeFromCart"])->name("removeFromCart")->middleware('auth');

Route::get("/cart", [OrderController::class, "showCart"])->name("cart")->middleware('auth');
Route::get("/checkout", [OrderController::class, "checkout"])->name("checkout")->middleware('auth');

Route::get("/make-payment", [OrderController::class, "makePayment"])->name("make.payment")->middleware('auth');

Route::post("checkout/add-address", [OrderController::class, "addAddress"])->name("order.addAddress")->middleware('auth');
Route::post("/address/create", [AddressController::class, "store"])->name('address.store');
//coupon routes
Route::post('/add-coupon', [OrderController::class, "addCoupon"])->name("coupon.add")->middleware('auth');
Route::get('/remove-coupon', [OrderController::class, "removeCoupon"])->name("coupon.remove")->middleware('auth');

Route::get("/{category}/{slug}", [HomeController::class, "viewProduct"])->name('view.product');
Route::get("/{slug}", [HomeController::class, "filter"])->name('view.filter');
