<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
->middleware('auth')
->name('home');

Route::prefix('admins')->middleware('auth')->group(function () {
    Route::get('/cities', [\App\Http\Controllers\CityController::class, 'index'])
        ->name('admins.cities.index');

    Route::get('/cities/create', [\App\Http\Controllers\CityController::class, 'create'])
        ->name('admins.cities.create');

    Route::post('/cities', [\App\Http\Controllers\CityController::class, 'store'])
        ->name('admins.cities.store');

    Route::get('/cities/{id}/edit', [\App\Http\Controllers\CityController::class, 'edit'])
        ->name('admins.cities.edit');

    Route::post('/cities/{id}', [\App\Http\Controllers\CityController::class, 'update'])
        ->name('admins.cities.update');

    Route::get('/cities/{id}', [\App\Http\Controllers\CityController::class, 'show'])
        ->name('cities.show');

    Route::get('/cities/review/{id}', [\App\Http\Controllers\CityController::class, 'showRate'])
        ->name('cities.review');

    Route::get('/cities/delete/{id}', [\App\Http\Controllers\CityController::class, 'destroy'])
        ->name('admins.cities.delete');

    //.........................................

    Route::get('/customers', [\App\Http\Controllers\CustomerController::class, 'index'])
        ->name('admins.customers.index');

    Route::get('/customers/create', [\App\Http\Controllers\CustomerController::class, 'create'])
        ->name('admins.customers.create');

    Route::post('/customers', [\App\Http\Controllers\CustomerController::class, 'store'])
        ->name('admins.customers.store');

    Route::get('/customers/{id}/edit', [\App\Http\Controllers\CustomerController::class, 'edit'])
        ->name('admins.customers.edit');

    Route::post('/customers/{id}', [\App\Http\Controllers\CustomerController::class, 'update'])
        ->name('admins.customers.update');

    Route::get('/customers/{id}', [\App\Http\Controllers\CustomerController::class, 'show'])
        ->name('admins.customers.show');

    Route::get('/customers/review/{id}', [\App\Http\Controllers\CustomerController::class, 'showRate'])
        ->name('customers.review');

    Route::get('/customers/delete/{id}', [\App\Http\Controllers\CustomerController::class, 'destroy'])
        ->name('admins.customers.delete');
});
//.........................................


