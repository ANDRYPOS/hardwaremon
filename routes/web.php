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

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    //categories
    Route::get('/categories-setting', [CategoriesController::class, 'setting'])->middleware(['admin'])->name('categories-setting'); //view categories setting //view categories setting
    Route::post('/categories-create', [CategoriesController::class, 'store'])->middleware(['admin'])->name('categories-create'); //proses simpan create categories
    Route::get('/categories-edit/{id}', [CategoriesController::class, 'edit'])->middleware(['admin']); //view form edit categories
    Route::put('/categories-update', [CategoriesController::class, 'update'])->middleware(['admin'])->name('categories-update'); //proses update categories
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

    // user profil
    Route::get('/users-profil/{id}', [UsersController::class, 'profil']); //form setting profil
    Route::put('/profil-update', [UsersController::class, 'profilUpdate']); //form setting profil update
    Route::post('/profil-updatePassword', [UsersController::class, 'password']); //form setting profil update

    //products
    Route::get('/products-setting', [ProductsController::class, 'setting'])->middleware(['admin'])->name('products-setting'); //view products setting form
    Route::get('/products-create', [ProductsController::class, 'create'])->middleware(['admin']); //view form create
    Route::post('/products-create', [ProductsController::class, 'store'])->middleware(['admin']); //proses simpan create
    Route::get('/products-edit/{id}', [ProductsController::class, 'edit'])->middleware(['admin']); //view form edit
    Route::put('/products-update', [ProductsController::class, 'update'])->middleware(['admin']); //proses update
    Route::get('/products-delete/{id}', [ProductsController::class, 'destroy'])->middleware(['admin']); //proses delete

    //setup-products
    Route::get('/products-acepted', [ProductsController::class, 'acepted'])->middleware(['admin']); //menampilkan yang acepted
    Route::get('/products-waiting', [ProductsController::class, 'waiting'])->middleware(['admin']); //menampilkan yang waiting
    Route::get('/products-rejected', [ProductsController::class, 'rejected'])->middleware(['admin']); //menampilkan yang rejected
    Route::put('/products-acepted', [ProductsController::class, 'productsAcepted'])->name('products-acepted')->middleware(['admin']); //proses simpan banner
    Route::put('/products-decline', [ProductsController::class, 'productsDecline'])->name('products-decline')->middleware(['admin']); //proses simpan banner


    // banner
    Route::get('/carousels', [CarouselsController::class, 'setting'])->middleware(['admin'])->name('carousels'); //view form and result carousels
    Route::post('/carousels-create', [CarouselsController::class, 'store'])->middleware(['admin']); //proses simpan banner
    Route::get('/carousels-delete/{id}', [CarouselsController::class, 'destroy'])->middleware(['admin']); //proses delete banner

    // verified dashboard
    Route::put('/carousels-acepted', [CarouselsController::class, 'acepted'])->name('carousels-acepted')->middleware(['admin']); //proses simpan banner
    Route::put('/carousels-decline', [CarouselsController::class, 'decline'])->name('carousels-decline')->middleware(['admin']); //proses simpan banner
});


// tidak dapat mengakses login, landing page, register setelah login dan belum logout
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login-proses', [LoginController::class, 'authenticate']);
    Route::get('/', [LandingController::class, 'index']);
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register-store', [RegisterController::class, 'store']);


    // Route::post('/', [LandingController::class, 'range']);
});

// kembali ke dashboard jika akses landing page dan login setelah didalam dashboard
Route::get('/home', function () {
    return redirect('/dashboard');
});
