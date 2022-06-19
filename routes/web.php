<?php

use App\Http\Livewire\Search;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/properties-for-rent', [HomeController::class, 'propertiesForRent'])->name('for-rent');
Route::get('/properties-for-sale', [HomeController::class, 'propertiesForSale'])->name('for-sale');
Route::get('/properties/{property}', [HomeController::class, 'show'])->name('property.show');
Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contact-us');
Route::post('/submit-form', [ContactController::class, 'store'])->name('contact-us.post');
Route::get('/properties', Search::class)->name('properties');

Route::group(['middleware' => 'auth'], function() {

    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');

    Route::group(['middleware' => 'admin', 'as' => 'contacts.', 'prefix' => 'contacts'], function() {
        Route::get('/', [ContactController::class, 'index'])->name('index');
        Route::delete('/{contact}', [ContactController::class, 'destroy'])->name('destroy');
    });
});

require __DIR__.'/auth.php';
