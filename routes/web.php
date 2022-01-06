<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\LocationController;

use App\Http\Controllers\DashboardController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


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

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/property/{id}', [HomeController::class, 'singleProperty'])->name('single-property');
    Route::get('/properties/', [HomeController::class, 'propertyIndex'])->name('properties');
    Route::get('/location/{id}', [HomeController::class, 'singleLocation'])->name('single-location');
    Route::get('/page/{slug}', [HomeController::class, 'singlePage'])->name('page');
    Route::post('/property-inquiry/{id}', [ContactController::class, 'propertyInquiry'])->name('property-inquiry');
    Route::get('/currency/{code}', [HomeController::class, 'currencyChange'])->name('currency-change');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard-index');

    
    Route::post('/dashboard/delete-media/{media_id}', [DashboardController::class, 'deleteMedia'])->name('delete-media');



    // Location Crud

    Route::resource('dashboard-location', LocationController::class);

    // Property Crud

    Route::resource('dashboard-property', PropertyController::class);
    
    // Page Crud

    Route::resource('dashboard-page', PageController::class);

    // User Crud

    Route::resource('dashboard-user', UserController::class);


    Route::get('/dashboard/messages', [DashboardController::class, 'messages'])->name('dashboard-messages');
    Route::get('/dashboard/message/{id}', [DashboardController::class, 'singleMessage'])->name('message');
    Route::delete('/dashboard/delete-message/{id}', [DashboardController::class, 'deleteMessage'])->name('delete-message');
});

require __DIR__.'/auth.php';
