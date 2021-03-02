<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\CustomerBookController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\CustomerServiceController;
use App\Http\Controllers\ProviderRequestController;
use App\Http\Controllers\AdminApplicationController;
use App\Http\Controllers\CustomerFeedbackController;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/registered-successfully', function(){
    alert()->success('registered successfully.');
    return redirect('/login');
});

Route::prefix('/customers')->name('customers.')->group(function(){
    Route::resource('/services', CustomerServiceController::class);
    Route::resource('/bookings', CustomerBookController::class);
    Route::resource('/feedbacks', CustomerFeedbackController::class);
});

//providers

Route::prefix('providers')->name('providers.')->group(function(){
    Route::resource('/requests', ProviderRequestController::class);
});

//admins
Route::prefix('admins')->name('admins.')->group(function(){
    Route::get('/login', [AdminLoginController::class, 'showLoginForm']);
    Route::post('/login', [AdminLoginController::class, 'login']);
    Route::get('/home', [AdminHomeController::class, 'index']);


    //application
    Route::resource('/applications', AdminApplicationController::class);
});
