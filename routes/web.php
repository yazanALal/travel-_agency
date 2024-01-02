<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use PHPUnit\TextUI\XmlConfiguration\Group;

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

use App\Http\Controllers\CompanyController;

// Route::group(['prefix' => 'company'], function () {
Route::get('company', [\App\Http\Controllers\CompanyController::class, 'index'])->name('company.index');
Route::get('company/create', [\App\Http\Controllers\CompanyController::class, 'create'])->name('company.create');
Route::post('company/store', [\App\Http\Controllers\CompanyController::class, 'store'])->name('company.store');
Route::get('company/edit/{id}', [\App\Http\Controllers\CompanyController::class, 'edit'])->name('company.edit');
Route::post('company/update/{id}', [\App\Http\Controllers\CompanyController::class, 'update'])->name('company.update');
Route::get('company/show/{id}', [\App\Http\Controllers\CompanyController::class], 'show')->name('company.show');
Route::get('company/delete/{id}', [\App\Http\Controllers\CompanyController::class], 'destroy')->name('company.delete');
// });


Route::get('tickets', [TicketController::class, 'index'])->name('tickets.index');
Route::get('tickets/create', [TicketController::class, 'create'])->name('tickets.create');
Route::post('tickets/store', [TicketController::class, 'store'])->name('tickets.store');
Route::get('tickets/edit/{id}', [TicketController::class, 'edit'])->name('tickets.edit');
Route::post('tickets/update/{id}', [TicketController::class, 'update'])->name('tickets.update');
Route::get('tickets/show/{id}', [TicketController::class, 'show'])->name('tickets.show');
Route::get('tickets/delete/{id}', [TicketController::class, 'destroy'])->name('tickets.delete');
