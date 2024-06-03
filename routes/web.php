<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\DishTypeController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\BeverageTypeController;
use App\Http\Controllers\BeverageController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\VisitanteController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Welcome Routes
Route::redirect('/', '/visitante');
Route::get('/visitante', [VisitanteController::class, 'index']);
Route::get('/menus/{menu}/public', [MenuController::class, 'showPublic'])->name('menus.showPublic');
Route::get('/home', [HomeController::class, 'index'])->name('home');



// Post Routes
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

// Authentication Routes
Auth::routes();

// Protected Routes
Route::group(['middleware' =>['auth']], function(){
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('suppliers', SupplierController::class);
    Route::resource('companies', CompanyController::class);
    Route::resource('branches', BranchController::class);
    Route::resource('dish-types', DishTypeController::class);
    Route::resource('dishes', DishController::class);
    Route::resource('beverage_types', BeverageTypeController::class);
    Route::resource('beverages', BeverageController::class);
    Route::resource('menus', MenuController::class);
});

// Cart Routes
Route::get('/shop', [CartController::class, 'shop'])->name('shop.index');
Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
Route::post('/cart', [CartController::class, 'add'])->name('cart.store');
Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::patch('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');

