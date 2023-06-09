<?php

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

Route::controller(TravelController::class)->prefix('user')->group(function() {
    Route::get('travel/home', 'index')->middleware('auth/register');
});



use App\Http\Controllers\TravelController;
Route::controller(TravelController::class)->prefix('user')->group(function() {
    Route::get('travel/home', 'index');
    Route::get('travel/create', 'create');
    
    
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\TravelController::class, 'add'])->name('home');
