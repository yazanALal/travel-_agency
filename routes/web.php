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
    Route::get('/hotels', [\App\Http\Controllers\HotelController::class, 'index'])
        ->name('admins.hotels.index');

    Route::get('/hotels/create', [\App\Http\Controllers\HotelController::class, 'create'])
        ->name('admins.hotels.create');

    Route::post('/hotels', [\App\Http\Controllers\HotelController::class, 'store'])
        ->name('admins.hotels.store');

    Route::get('/hotels/{id}/{city_id}/edit', [\App\Http\Controllers\HotelController::class, 'edit'])
        ->name('admins.hotels.edit');

    Route::put('/hotels/{id}', [\App\Http\Controllers\HotelController::class, 'update'])
        ->name('admins.hotels.update');

    Route::get('/hotels/{id}', [\App\Http\Controllers\HotelController::class, 'show'])
        ->name('hotels.show');

    Route::get('/hotels/review/{id}', [\App\Http\Controllers\HotelController::class, 'showRate'])
        ->name('hotels.review');

    Route::get('/hotels/delete/{id}', [\App\Http\Controllers\HotelController::class, 'destroy'])
        ->name('admins.hotels.delete');

    //.........................................
    // ........................................

    Route::get('/rates', [\App\Http\Controllers\ReviewController::class, 'index'])
        ->name('admins.rates.index');

    Route::get('/rates/create', [\App\Http\Controllers\ReviewController::class, 'create'])
        ->name('admins.rates.create');

    Route::post('/rates', [\App\Http\Controllers\ReviewController::class, 'store'])
        ->name('admins.rates.store');

    Route::get('/rates/{id}/{hotel_id}/{customer_id}/edit', [\App\Http\Controllers\ReviewController::class, 'edit'])
        ->name('admins.rates.edit');

    Route::post('/rates/{id}', [\App\Http\Controllers\ReviewController::class, 'update'])
        ->name('admins.rates.update');

    Route::get('/rates/delete/{id}', [\App\Http\Controllers\ReviewController::class, 'destroy'])
        ->name('admins.rates.delete');
});
