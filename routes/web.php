
<?php

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

Route::get('/dashboard', function(){
    return view('dashboard');
});

Route::get('/register', [RegisterController::class, 'view']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'view'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/dashboard', [BarangController::class, 'index'])->middleware('auth');

Route::get('/create', [BarangController::class, 'create'])->middleware('auth', 'isAdmin');
Route::post('/store', [BarangController::class, 'store'])->middleware('auth', 'isAdmin');






