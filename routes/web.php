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

use App\Http\Controllers\TravelController;
Route::controller(TravelController::class)->prefix('user')->group(function() {
    Route::get('travel/home', 'add');
});

// Route::controller(TravelController::class)->prefix('user')->group(function() {
//     Route::get('travel/home', 'add')->middleware('auth');
// });



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
