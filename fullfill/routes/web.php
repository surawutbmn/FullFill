<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});
use App\Http\Controllers\BE\LoginController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Seller\SellerController;

use App\Http\Controllers\QRController;


Route::get('/map', [QRController::class, 'map']);
Route::get('/qr', [QRController::class, 'index']);
Route::post('/generate', [QRController::class, 'generate'])->name('generate');
Route::get('/qr-image', [QRController::class, 'showImage'])->name('show.image');

// Route::middleware(['checkRole:0'])->group(function () {
    //     Route::get('/member/dashboard', [HomeController::class, 'dashboard'])->name('member.dashboard');
    // });
    
// Route::post('/order/store', [OrderController::class, 'store'])->name('orders.store');
Route::post('/order/details', [OrderController::class, 'showOrderDetails'])->name('order.detail');
Route::get('/admin/order',[App\Http\Controllers\BE\HomeController::class, 'order'])->name('be.order');
// Route::get('/orderdetail',[OrderController::class, 'detail'])->name('order.detail');
Route::get('/payment',[OrderController::class, 'payment'])->name('order.payment');
Route::post('/payment/{orderId}/process',[OrderController::class, 'processPayment'])->name('payment.process');

Route::get('/p', [App\Http\Controllers\FE\HomeController::class, 'show'])->name('fe.profile');
Route::get('/news&activity', [App\Http\Controllers\FE\HomeController::class, 'news'])->name('fe.news');
Route::get('/shop', [App\Http\Controllers\FE\HomeController::class, 'shop'])->name('fe.shop');
Route::get('/product', [App\Http\Controllers\FE\HomeController::class, 'index'])->name('fe.product');
Route::get('/', [App\Http\Controllers\FE\HomeController::class, 'homepage'])->name('fe.homepage');
Route::get('/list-order', [OrderController::class, 'success'])->name('fe.success');
Route::get('/list-order/check', [OrderController::class, 'verify'])->name('fe.toorder');

Route::get('/product/{id}', [\App\Http\Controllers\Fe\HomeController::class, 'detail'])->name('fe.home.detail')->where('id', '[0-9]+');
Route::post('{id}/order', [OrderController::class, 'order'])->where('id','[0-9]+');
Route::post('{productId}/order/store', [OrderController::class, 'store'])->name('fe.orders.store');
// Route::post('/orders/store', [OrderController::class, 'store'])->name('fe.orders.store');


Route::get('/seller/register', [LoginController::class, 'registerSeller'])->name('be.register.seller');
Route::post('/seller/register', [LoginController::class, 'postRegisterSeller'])->name('be.register.seller.post');
Route::get('/member/register', [LoginController::class, 'registerBuyer'])->name('be.register.buyer');
Route::post('/member/register', [LoginController::class, 'postRegisterBuyer'])->name('be.register.buyer.post');
Route::get('/create/s', [SellerController::class, 'create'])->name('shop.create');
Route::get('/logout', [App\Http\Controllers\BE\LoginController::class, 'logout'])->name('logout');

Route::get('/pd', [SellerController::class, 'pdshow'])->name('shops.product');
Route::middleware(['checkRole:2'])->group(function () {
    Route::get('/shops/{id}', [SellerController::class, 'show'])->name('shops.detail');
    Route::get('/seller/logout', [App\Http\Controllers\BE\LoginController::class, 'logout'])->name('seller.logout');
    Route::get('/create/shop', [SellerController::class, 'createShop'])->name('seller.create');
    Route::post('/shops', [SellerController::class, 'store'])->name('shops.store');
    Route::get('/om', [SellerController::class, 'orderManage'])->name('seller.order');
});
Route::get('login',[LoginController::class, 'index'])->name('login.index');
Route::post('login',[LoginController::class, 'postLogin'])->name('ff.login.postlogin');


Route::middleware(['checkRole:1'])->group(function () {
    Route::get('be/logout', [App\Http\Controllers\BE\LoginController::class, 'logout'])->name('be.logout');
    Route::get('/admin', [App\Http\Controllers\BE\HomeController::class, 'index'])->name('be.home.index');
    Route::get('/admin/create', [App\Http\Controllers\BE\HomeController::class, 'create'])->name('be.home.create');
    Route::post('/admin/store', [App\Http\Controllers\BE\HomeController::class, 'store'])->name('be.home.store');
    Route::get('/admin/edit/{id}', [App\Http\Controllers\BE\HomeController::class, 'edit'])->name('be.home.edit');
    Route::post('/admin/update/{id}', [App\Http\Controllers\BE\HomeController::class, 'update'])->name('be.home.update');
    Route::delete('/admin/delete/{id}', [App\Http\Controllers\BE\HomeController::class, 'delete'])->name('be.home.delete');
});

// Route::get('/payment', [App\Http\Controllers\FE\HomeController::class, 'payment'])->name('order.payment.index');
// Route::post('/payment', [\App\Http\Controllers\FE\HomeController::class, 'paymentPost'])->name('payment.post');
// Route::post('/reserve/success', [App\Http\Controllers\Order\OrderController::class, 'showOrderDetails'])->name('fe.reserve.success');
//Route::post('/order/store', [App\Http\Controllers\FE\HomeController::class, 'store'])->name('fe.order.store');

//Route::controller(StripePaymentController::class)->group(function(){
//    Route::get('stripe', 'stripe');
//    Route::post('stripe', 'paymentPost')->name('payment.post');
//});
