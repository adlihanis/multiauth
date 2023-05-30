<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApplianceController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\CheckoutController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('redirects', 'App\Http\Controllers\HomeController@index');
Route::get('addelectric', 'App\Http\Controllers\HomeController@electric')->name('electric');
Route::post('addelectric', 'App\Http\Controllers\HomeController@electric')->name('electric');
Route::get('application', 'App\Http\Controllers\HomeController@application');
Route::get('status', 'App\Http\Controllers\HomeController@status')->name('status');

Route::post('/appliances', [ApplianceController::class, 'store']);
Route::get('/application', 'App\Http\Controllers\ApplianceController@application')->name('application');
Route::delete('/appliances/{id}', [ApplianceController::class, 'destroy'])->name('delete');

Route::get('/application', [ApplianceController::class, 'showAll'])->name('application.showAll');
Route::get('/application/{id}', [ApplianceController::class, 'show'])->name('application.show');

Route::post('/appliances', [ApplianceController::class, 'store'])->name('appliances.store');
Route::get('/application', [ApplianceController::class, 'application'])->name('application');
Route::put('/appliances/{id}/approve', [ApplianceController::class, 'approve'])->name('approve');
Route::put('/appliances/{id}/reject', [ApplianceController::class, 'reject'])->name('reject');

//application status
Route::get('/status', [ApplianceController::class, 'status'])->name('status');
Route::delete('/delete/{id}', [ApplianceController::class, 'delete'])->name('delete');

//search
Route::get('/search', [ApplianceController::class, 'search'])->name('application.search');
// Route::get('/showlist', [ApplianceController::class, 'showList'])->name('application.showList');


// Route::get('/application', function () {
//     return view('/application');
// });
// Route::get('/qrcode', [QrCodeController::class, 'generateQrCode']);

Route::get('/checkout/{id}', [ApplianceController::class, 'checkout'])->name('checkout');
Route::get('/checkout/success/{id}', [ApplianceController::class, 'success'])->name('checkout.success');
Route::get('/checkout/cancel/{id}', [ApplianceController::class, 'cancel'])->name('checkout.cancel');

