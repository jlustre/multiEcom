<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\CategoryController;

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
        Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category');
        Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('store.category');
        Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);
        Route::get('/category/view/{id}', [CategoryController::class, 'View']);
        Route::get('/category/softdelete/{id}', [CategoryController::class, 'SoftDelete']);
        Route::post('/category/update/{id}', [CategoryController::class, 'Update']);
        Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);
        Route::get('/category/pdelete/{id}', [CategoryController::class, 'ForceDelete']);

        //Users
        Route::get('/user/all', [UserController::class, 'AllUser'])->name('all.user');
        Route::post('/user/add', [UserController::class, 'AddUser'])->name('store.user');
        Route::get('/user/edit/{id}', [UserController::class, 'Edit']);
        Route::get('/user/view/{id}', [UserController::class, 'View']);
        Route::get('/user/softdelete/{id}', [UserController::class, 'SoftDelete']);
        Route::post('/user/update/{id}', [UserController::class, 'Update']);
        Route::post('/user/updatepwd/{id}', [UserController::class, 'UpdatePassword']);
        Route::get('/user/restore/{id}', [UserController::class, 'Restore']);
        Route::get('/user/pdelete/{id}', [UserController::class, 'ForceDelete']);

        //Brands
        Route::get('/brand/all', [UserController::class, 'AllUser'])->name('all.brand');
        Route::post('/brand/add', [UserController::class, 'AddUser'])->name('store.brand');
        Route::get('/brand/edit/{id}', [UserController::class, 'Edit']);
        Route::get('/brand/view/{id}', [UserController::class, 'View']);
        Route::get('/brand/softdelete/{id}', [UserController::class, 'SoftDelete']);
        Route::post('/brand/update/{id}', [UserController::class, 'Update']);
        Route::get('/brand/restore/{id}', [UserController::class, 'Restore']);
        Route::get('/brand/pdelete/{id}', [UserController::class, 'ForceDelete']);
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
