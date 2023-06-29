<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\PlanController;
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
    Route::get('travel/{id}', 'show')->name('travel.show');//aダグ
    Route::get('travel/create','create')->name('travel.create');//aタグ
    Route::post('travel/store', 'store')->name('travel.store');
    Route::post('travrl/edit,')
});




Route::controller(PlanController::class)->prefix('user')->middleware('auth')->group(function() {
    Route::get('plan/create','create')->name('plan.create');
    Route::post('plan/store','store')->name('plan.store');
});





