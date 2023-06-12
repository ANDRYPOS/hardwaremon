<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CarouselsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

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

// hak aksers users login
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::post('/logout', [LoginController::class, 'logout']);

    //categories
    Route::get('/categories-setting', [CategoriesController::class, 'setting'])->middleware(['admin']); //view categories setting //view categories setting
    Route::get('/categories-create', [CategoriesController::class, 'create'])->middleware(['admin']); //view catgeories create
    Route::post('/categories-create', [CategoriesController::class, 'store'])->middleware(['admin']); //proses simpan create categories
    Route::get('/categories-edit/{id}', [CategoriesController::class, 'edit'])->middleware(['admin']); //view form edit categories
    Route::put('/categories-update', [CategoriesController::class, 'update'])->middleware(['admin']); //proses update categories
    Route::get('/categories-delete/{id}', [CategoriesController::class, 'destroy'])->middleware(['admin']); //proses delete categories

    //users
    Route::get('/users-group', [UsersController::class, 'usersGroup'])->middleware(['admin']); //view usersgroup table
    Route::get('/users-setting', [UsersController::class, 'setting'])->middleware(['admin']); //view users setting form
    Route::get('/users-create', [UsersController::class, 'create'])->middleware(['admin']); //view form create
    Route::post('/users-create', [UsersController::class, 'store'])->middleware(['admin']); //proses simpan create
    Route::get('/users-edit/{id}', [UsersController::class, 'edit'])->middleware(['admin']); //form edit
    Route::put('/users-update', [UsersController::class, 'update'])->middleware(['admin']); //proses update
    Route::get('/users-delete/{id}', [UsersController::class, 'destroy'])->middleware(['admin']); //proses delete user

    //filter group role users
    Route::get('/filter-admin', [UsersController::class, 'admin'])->middleware(['admin']); //filter role admin
    Route::get('/filter-staff', [UsersController::class, 'staff'])->middleware(['admin']); //filter role staff
    Route::get('/filter-user', [UsersController::class, 'users'])->middleware(['admin']); //filter user

    Route::get('/users-profil/{id}', [UsersController::class, 'profil']); //form setting profil
    Route::post('/users-profil', [UsersController::class, 'profilUpdate']); //form setting profil

    //products
    Route::get('/products-setting', [ProductsController::class, 'setting'])->middleware(['admin']); //view products setting form
    Route::get('/products-create', [ProductsController::class, 'create'])->middleware(['admin']); //view form create
    Route::post('/products-create', [ProductsController::class, 'store'])->middleware(['admin']); //proses simpan create
    Route::get('/products-edit/{id}', [ProductsController::class, 'edit'])->middleware(['admin']); //view form edit
    Route::put('/products-update', [ProductsController::class, 'update'])->middleware(['admin']); //proses update
    Route::get('/products-delete/{id}', [ProductsController::class, 'destroy'])->middleware(['admin']); //proses delete
    Route::get('/products-deleteDashboard/{id}', [ProductsController::class, 'destroyDashboard'])->middleware(['admin']); //proses delete

    // banner
    Route::get('/carousels', [CarouselsController::class, 'setting'])->middleware(['admin']); //view form and result carousels
    Route::post('/carousels-create', [CarouselsController::class, 'store'])->middleware(['admin']); //proses simpan banner
    Route::get('/carousels-edit/{id}', [CarouselsController::class, 'edit'])->middleware(['admin']); //view form edit carousels
    Route::put('/carousels-update', [CarouselsController::class, 'update'])->middleware(['admin']); //proses simpan update banner
    Route::get('/carousels-delete/{id}', [CarouselsController::class, 'destroy'])->middleware(['admin']); //proses delete banner

    // verified
    Route::put('/carousels-acepted', [CarouselsController::class, 'acepted'])->name('carousels-acepted')->middleware(['admin']); //proses simpan banner
    Route::put('/carousels-decline', [CarouselsController::class, 'decline'])->name('carousels-decline')->middleware(['admin']); //proses simpan banner
    Route::put('/products-acepted', [DashboardController::class, 'productsAcepted'])->name('products-acepted')->middleware(['admin']); //proses simpan banner
    Route::put('/products-decline', [DashboardController::class, 'productsDecline'])->name('products-decline')->middleware(['admin']); //proses simpan banner

});


// tidak dapat mengakses login, landing page, register setelah login dan belum logout
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login-proses', [LoginController::class, 'authenticate']);
    Route::get('/', [LandingController::class, 'index']);
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register-store', [RegisterController::class, 'store']);
});

// kembali ke dashboard jika akses landing page dan login setelah didalam dashboard
Route::get('/home', function () {
    return redirect('/dashboard');
});
