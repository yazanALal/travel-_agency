<?php


use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])
    ->middleware('auth')
    ->name('home');

//user routes    
Route::controller(UserController::class)->group(function () {
    Route::get('/change-password', 'changePassword')->name('change-password');
    Route::post('/change-password',  'updatePassword')->name('update-password');
    Route::get('/profile',  'showProfile');
    Route::post('/profile-upload', 'storeImage')->name('upload-image');
    Route::post('/profile-update',  'updateProfile')->name('update-profile');
    Route::get('delete-account', 'destroy')->name('delete-account');
    Route::get('delete-image', 'destroyImage')->name('delete-image');
})->middleware('auth');

//booking routes
Route::controller(BookingController::class)->group(function () {
    Route::get('bookings',  'index');
    Route::get('show-booking/{id}',  'show')->name('show-booking');
    Route::get('/edit-booking/{id}',  'edit')->name('edit-booking');
    Route::post('/edit-booking/{id}',  'update')->name('update-booking');
    Route::get('booking-create',  'create')->name('booking-create');
    Route::post('booking-create',  'store')->name('booking-store');
    Route::get('/delete-booking/{id}',  'destroy')->name('delete-booking');
})->middleware('auth');
