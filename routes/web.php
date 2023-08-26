<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\BelongingsController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\SearchController;
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
Route::get('/home', [TravelController::class, 'index'])->name('home');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



Route::controller(TravelController::class)->prefix('user')->middleware('auth')->group(function() {
    Route::get('travel/create','create')->name('travel.create');//aタグ
    Route::post('travel/store', 'store')->name('travel.store');
    Route::get('travel/{id}', 'show')->name('travel.show')->where('id', '[0-9]+');//aダグ
    Route::get('travel/{id}/edit','edit')->name('travel.edit');
    Route::post('travel/{id}/update','update')->name('travel.update');
    Route::get('travel/{id}/delete','delete')->name('travel.delete');
});


Route::controller(PlanController::class)->prefix('user')->middleware('auth')->group(function() {
    Route::get('travel/{travel_id}/plan/create','create')->name('plan.create');
    Route::post('travel/{travel_id}/plan','store')->name('plan.store');
    Route::get('plan/{plan_id}/edit','edit')->name('plan.edit');
    Route::post('plan/{plan_id}/update','update')->name('plan.update');
    Route::get('plan/{plan_id}/delete','delete')->name('plan.delete');
    // Route::get('plan/{travel_id}/plan_id}/show','show')->name('travel.plan.show');
});


Route::controller(BelongingsController::class)->prefix('user')->middleware('auth')->group(function() {
    Route::get('travel/belongings/create','create')->name('belongings.create');
    Route::post('travel/belongings/store','store')->name('belongings.store');
    Route::post('travel/belongings/check','check')->name('belongings.check');
    Route::get('travel/belongings/{id}/edit','edit')->name('belongings.edit'); 
    Route::post('travel/belongings/{id}/update','update')->name('belongings.update');
    Route::get('travel/belongings/{id}/delete','delete')->name('belongings.delete');
    
});

Route::controller(WeatherController::class)->prefix('user')->middleware('auth')->group(function() {
    Route::get('travel/weather','create')->name('weather.create');

});


Route::controller(SearchController::class)->prefix('user')->middleware('auth')->group(function(){
    Route::get('travel/search','create')->name('search.create');
    
});







