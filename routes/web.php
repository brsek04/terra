<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;

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
})->name('welcome');

Route::get('/cervezas', function () {
    return view('cervezas');
});
Route::get('/armatupack', function () {
    return view('armatupack');
});
Route::get('/product-pack6', function () {
    return view('product-pack6');
});
Route::get('/product-pack12', function () {
    return view('product-pack12');
});
Route::get('/contacto', function () {
    return view('contacto');
});
Route::get('/nosotros', function () {
    return view('nosotros');
});
Route::get('/packs', function () {
    return view('packs');
});
Route::get('/dondeestamos', function () {
    return view('dondeestamos');
});
// returns the home page with all posts
// Route::get('/', PostController::class .'@index')->name('posts.index');
// returns the form for adding a post
Route::get('/posts/create', PostController::class . '@create')->name('posts.create');
// adds a post to the database
Route::post('/posts', PostController::class .'@store')->name('posts.store');
// returns a page that shows a full post
Route::get('/posts/{post}', PostController::class .'@show')->name('posts.show');
// returns the form for editing a post
Route::get('/posts/{post}/edit', PostController::class .'@edit')->name('posts.edit');
// updates a post
Route::put('/posts/{post}', PostController::class .'@update')->name('posts.update');
// deletes a post
Route::delete('/posts/{post}', PostController::class .'@destroy')->name('posts.destroy');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' =>[ 'auth']], function(){
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
});


use App\Http\Controllers\SupplierController;
Route::resource('suppliers', SupplierController::class);

use App\Http\Controllers\CompanyController;
Route::resource('companies', CompanyController::class);

use App\Http\Controllers\BranchController;
Route::resource('branches', BranchController::class);

use App\Http\Controllers\DishTypeController;
Route::resource('dish-types', DishTypeController::class);

use App\Http\Controllers\DishController;
Route::resource('dishes', DishController::class);

use App\Http\Controllers\BeverageTypeController;
Route::resource('beverage_types', BeverageTypeController::class);

use App\Http\Controllers\BeverageController;
Route::resource('beverages', BeverageController::class);

use App\Http\Controllers\CartController;
Route::get('/shop', [CartController::class, 'shop'])->name('shop.index');
Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
Route::post('/cart', [CartController::class, 'add'])->name('cart.store');

Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::patch('/cart/{id}', [CartController::class, 'update'])->name('cart.update');

Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

Route::post('/cart/add', 'CartController@add')->name('cart.add');

