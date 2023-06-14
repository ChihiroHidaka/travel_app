<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\Auth\LoginController;
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
Route::get('/home', [TravelController::class, 'add'])->name('home');//書き方が違うのはなぜだろう
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::controller(TravelController::class)->prefix('user')->middleware('auth')->group(function() {
    Route::get('travel/home', 'add');
    Route::get('travel/create', 'create');
});




Route::controller(PlanController::class)->prefix('user')->middleware('auth')->group(function() {
    Route::post('travel/store','store')->name('plan.store');
});





