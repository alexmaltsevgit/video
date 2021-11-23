<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

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
    return redirect('/register');
});

Route::get('/dashboard/{token}/', [DashboardController::class, 'index'])
    ->middleware('ip')
    ->name('dashboard.index');

Route::get('/dashboard/{token}/module/{module}', [DashboardController::class, 'module'])
    ->middleware('ip')
    ->name('dashboard.module');

Route::get('/payment/{phone}', [PaymentController::class, 'create'])
    ->middleware('guest')
    ->name('payment');

Route::get('/admin', function () {
    return view('admin');
})->middleware(['auth'])->name('admin');

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
