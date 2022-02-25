<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('welcome');
})->name('main');

Route::get('/dashboard', function () {
    return view('/home');
})->middleware(['auth'])->name('dashboard');

Route::prefix('user')->name('user.')->group(function () {
    // NOT authenticated user
    Route::middleware(['guest:web', 'prevent-back-history'])->group(function() {
        Route::view('/login', 'dashboard.user.login')->name('login');
        Route::view('/register', 'dashboard.user.register')->name('register');
        Route::post('/create', [UserController::class, 'create'])->name('create');
        Route::post('/check', [UserController::class, 'check'])->name('check');
    });
    // authenticated user
    Route::middleware(['auth:web', 'prevent-back-history'])->group(function() {
        Route::view('/home', 'dashboard.user.home')->name('home');
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    });
});

Route::prefix('admin')->name('admin.')->group(function () {
    // NOT authenticated admin
    Route::middleware(['guest:admin', 'prevent-back-history'])->group(function() {
        Route::view('/login', 'dashboard.admin.login')->name('login');
        Route::view('/register', 'dashboard.admin.register')->name('register');
        Route::post('/create', [AdminController::class, 'create'])->name('create');
        Route::post('/check', [AdminController::class, 'check'])->name('check');
    });
    
    // authenticated admin
    Route::middleware(['auth:admin', 'prevent-back-history'])->group(function() {
        Route::view('/home', 'dashboard.admin.home')->name('home');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
        
        //Categories
        Route::resource('category', CategoryController::class);
        Route::get('/category/softdelete/{id}', [CategoryController::class, 'softDelete'])->where('id', '[0-9]+');
        Route::get('/category/restore/{id}', [CategoryController::class, 'restore'])->where('id', '[0-9]+');

        //Users
        Route::resource('user', UserController::class);
        Route::get('/user/softdelete/{id}', [UserController::class, 'softDelete'])->where('id', '[0-9]+');
        Route::post('/user/updatepwd/{id}', [UserController::class, 'updatePassword'])->where('id', '[0-9]+');
        Route::get('/user/restore/{id}', [UserController::class, 'restore'])->where('id', '[0-9]+');

        //Brands
        Route::resource('brand', MenuController::class);
        Route::get('/brand/softdelete/{id}', [MenuController::class, 'softDelete'])->where('id', '[0-9]+');
        Route::get('/brand/restore/{id}', [MenuController::class, 'restore'])->where('id', '[0-9]+');

        //Products
        Route::resource('product', ProductController::class);
        Route::get('/product/softdelete/{id}', [MenuController::class, 'softDelete'])->where('id', '[0-9]+');
        Route::get('/product/restore/{id}', [MenuController::class, 'restore'])->where('id', '[0-9]+');

        //Menus
        Route::resource('menu', MenuController::class);
        Route::get('/menu/softdelete/{id}', [MenuController::class, 'softDelete'])->where('id', '[0-9]+');
        Route::get('/menu/restore/{id}', [MenuController::class, 'restore'])->where('id', '[0-9]+');
    });
});

Route::prefix('seller')->name('seller.')->group(function () {
    // NOT authenticated seller
    Route::middleware(['guest:seller', 'prevent-back-history'])->group(function() {
        Route::view('/login', 'dashboard.seller.login')->name('login');
        Route::view('/register', 'dashboard.seller.register')->name('register');
        Route::post('/create', [SellerController::class, 'create'])->name('create');
        Route::post('/check', [SellerController::class, 'check'])->name('check');
    });
    // authenticated seller
    Route::middleware(['auth:seller', 'prevent-back-history'])->group(function() {
        Route::view('/home', 'dashboard.seller.home')->name('home');
        Route::post('/logout', [SellerController::class, 'logout'])->name('logout');
    });
});

require __DIR__.'/auth.php';
