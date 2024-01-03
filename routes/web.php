<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use PHPUnit\TextUI\XmlConfiguration\Group;
use App\Http\Controllers\CompanyController;
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




// Route::group(['prefix' => 'company'], function () {
Route::get('company', [\App\Http\Controllers\CompanyController::class, 'index'])->name('company.index');
Route::get('company/create', [\App\Http\Controllers\CompanyController::class, 'create'])->name('company.create');
Route::post('company/store', [\App\Http\Controllers\CompanyController::class, 'store'])->name('company.store');
Route::get('company/edit/{id}', [\App\Http\Controllers\CompanyController::class, 'edit'])->name('company.edit');
Route::post('company/update/{id}', [\App\Http\Controllers\CompanyController::class, 'update'])->name('company.update');
Route::get('company/show/{id}', [\App\Http\Controllers\CompanyController::class, 'show'])->name('company.show');
Route::get('company/delete/{id}', [\App\Http\Controllers\CompanyController::class, 'destroy'])->name('company.delete');
// });


Route::get('ticket', [TicketController::class, 'index'])->name('ticket.index');
Route::get('ticket/create', [TicketController::class, 'create'])->name('ticket.create');
Route::post('ticket/store', [TicketController::class, 'store'])->name('ticket.store');
Route::get('ticket/edit/{id}', [TicketController::class, 'edit'])->name('ticket.edit');
Route::post('ticket/update/{id}', [TicketController::class, 'update'])->name('ticket.update');
Route::get('ticket/show/{id}', [TicketController::class, 'show'])->name('ticket.show');
Route::get('ticket/delete/{id}', [TicketController::class, 'destroy'])->name('ticket.delete');

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
