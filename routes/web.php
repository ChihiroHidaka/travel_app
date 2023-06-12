<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TravelController;
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


Route::controller(TravelController::class)->prefix('user')->group(function() {
    Route::get('travel/home', 'add')->middleware('auth');
});


Route::controller(TravelController::class)->prefix('user')->group(function() {
    Route::get('travel/create', 'create');
    
});




