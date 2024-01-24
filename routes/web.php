<?php

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

Route::get('/', function () {
    return view('scanno');
});

Auth::routes();

Route::get('/login/admin',      [App\Http\Controllers\Auth\LoginController::class, 'showAdminLoginForm']);
Route::get('/login/vendor',     [App\Http\Controllers\Auth\LoginController::class, 'showVendorLoginForm']);
Route::get('/register/admin',   [App\Http\Controllers\Auth\RegisterController::class,'showAdminRegisterForm']);
Route::get('/register/vendor',  [App\Http\Controllers\Auth\RegisterController::class,'showVendorRegisterForm']);

Route::post('/login/admin',     [App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin-login');
Route::post('/login/vendor',    [App\Http\Controllers\Auth\LoginController::class, 'vendorLogin'])->name('vendor-login');
Route::post('/register/admin',  [App\Http\Controllers\Auth\RegisterController::class,'createAdmin'])->name('admin-register');
Route::post('/register/vendor', [App\Http\Controllers\Auth\RegisterController::class,'createVendor']);
Route::post('/logout',          [App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');

Route::view('/home', 'home')->middleware('auth');
Route::view('/admin', 'admin')->middleware('auth:admin');
//Route::view('/admin', 'admin');
Route::view('/admin-chk', 'admin'); //tmp
//Route::view('/vendor', 'vendor');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');

Route::get('/admin/vendors', [App\Http\Controllers\AdminController::class, 'vendors'])->name('vendors');
Route::get('/admin/claims', [App\Http\Controllers\AdminController::class, 'claims'])->name('claims');
Route::get('/admin/register-vendor', [App\Http\Controllers\AdminController::class, 'showVendorRegisterForm']);
Route::post('/admin/register-vendor', [App\Http\Controllers\AdminController::class, 'createVendor'])->name('vendor-register');
Route::get('/admin/register-vendor-shop', [App\Http\Controllers\VendorShopController::class, 'create'])->middleware('auth:admin');
Route::get('/admin/vendor-shop/edit/{id}', [App\Http\Controllers\VendorShopController::class, 'edit'])->middleware('auth:admin');
Route::get('/admin/vendor-mlm/{id}', [App\Http\Controllers\VendorShopController::class, 'vendorMlm'])->name('admin-vendor-mlm')->middleware('auth:admin');
Route::get('/admin/vendor-shops/{id}', [App\Http\Controllers\VendorShopController::class, 'vendorShops'])->name('admin-vendor-list')->middleware('auth:admin');
Route::get('/admin/login-as-vendor/{id}', [App\Http\Controllers\AdminController::class, 'loginAsVendor'])->name('login-as-vendor')->middleware('auth:admin');
Route::get('/vendor-shop-change-status', [App\Http\Controllers\VendorShopController::class, 'shopChangeStatus']);

Route::post('/admin/register-vendor-shop', [App\Http\Controllers\VendorShopController::class, 'store'])->name('vendor-register-shop');
Route::patch('/admin/vendor-shop/edit/{id}', [App\Http\Controllers\VendorShopController::class, 'update'])->name('vendor-shop-update');

/** VENDOR ROUTES */
Route::get('/vendor', [App\Http\Controllers\VendorController::class, 'index'])->name('vendor')->middleware('auth:vendor');
Route::get('/vendor-mlm', [App\Http\Controllers\VendorController::class, 'vendorMlm'])->name('vendor-mlm')->middleware('auth:vendor');

/** CLAIM SUBMISSION BY VENDORS */
Route::post('/claim/submit', [App\Http\Controllers\VendorClaimController::class,'submit'])->name('vendor-claim')->middleware('auth:vendor');;
Route::get('/vendor/claims', [App\Http\Controllers\VendorClaimController::class,'vendorList'])->name('vendor-claims')->middleware('auth:vendor');;

/** CLAIM ADMIN ROUTES */
Route::middleware('auth:admin')->group(function () {
    // List claims for admin
    Route::get('/admin/claims', [App\Http\Controllers\VendorClaimController::class,'adminList'])->name('admin-claims');

    // Approve or reject claims
    Route::post('/admin/claim/approve', [App\Http\Controllers\VendorClaimController::class,'approve'])->name('admin-claim-approve');
    Route::post('/admin/claim/reject', [App\Http\Controllers\VendorClaimController::class,'reject'])->name('admin-claim-reject');
});
