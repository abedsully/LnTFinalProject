
<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

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
    return view('home');
});


Route::get('/register', [RegisterController::class, 'view']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'view'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/dashboard', [BarangController::class, 'index'])->middleware('auth');
Route::get('add-to-cart/{id}', [BarangController::class, 'addtoCart'])->name('add_to_cart')->middleware('auth');
Route::get('/create', [BarangController::class, 'create'])->middleware('auth', 'isAdmin');
Route::post('/store', [BarangController::class, 'store'])->middleware('auth', 'isAdmin');
Route::get('cart', [BarangController::class, 'cart'])->name('cart')->middleware('auth');


Route::get('/edit-barang/{id}', [BarangController::class, 'editBarang'])->name('edit')->middleware('auth', 'isAdmin');
Route::patch('/update-barang/{id}', [BarangController::class, 'updateBarang'])->name('update')->middleware('auth', 'isAdmin');
Route::delete('/delete-barang/{id}', [BarangController::class, 'delete'])->name('delete')->middleware('auth', 'isAdmin');


Route::patch('update-cart', [BarangController::class, 'update'])->name('update_cart')->middleware(('auth'));
Route::delete('remove-from-cart', [BarangController::class, 'remove'])->name('remove_from_cart')->middleware('auth');


Route::post('/checkout', [AddressController::class, 'checkout']);



