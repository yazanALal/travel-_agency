<?php


use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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
