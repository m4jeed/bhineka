<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\FakturController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\AuthController;
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

Route::get('/', [AuthController::class, 'index']);
Route::get('/login', [AuthController::class, 'toLogin'])->name('login');
Route::post('/login', [AuthController::class, 'signinLogin']);


Route::prefix('admin')->group(function () {
    Route::get('logout', [AuthController::class, 'logOut']);
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->middleware('auth');
    });

    Route::prefix('faktur')->group(function () {
        Route::get('/', [FakturController::class, 'index'])->middleware('auth');
        Route::get('create', [FakturController::class, 'create'])->middleware('auth');
        Route::post('save', [FakturController::class, 'insert'])->middleware('auth');
        Route::get('/edit/{id}', [FakturController::class, 'edit'])->middleware('auth');
        Route::put('/update-faktur/{id}', [FakturController::class, 'update'])->middleware('auth');
        Route::post('/delete/{id}', [FakturController::class, 'delete'])->middleware('auth');
        Route::get('/detil/{invoice_number}', [FakturController::class, 'detil'])->middleware('auth');

    });

    Route::prefix('customer')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->middleware('auth');
        Route::get('create', [CustomerController::class, 'create'])->middleware('auth');
        Route::post('save', [CustomerController::class, 'insert'])->middleware('auth');
        Route::get('/detil/{id}', [CustomerController::class, 'detil'])->middleware('auth');
        Route::get('/edit/{id}', [CustomerController::class, 'edit'])->middleware('auth');
        Route::put('/update-customer/{id}', [CustomerController::class, 'update'])->middleware('auth');
        Route::post('/delete-customer/{id}', [CustomerController::class, 'delete'])->middleware('auth');
    });
    
});






