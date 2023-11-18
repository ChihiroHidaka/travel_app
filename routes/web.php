<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\BelongingsController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PasswordController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


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
    return view('auth.login');
});


Auth::routes();
Route::get('/home', [TravelController::class, 'create'])->name('home');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::controller(TravelController::class)->prefix('user')->middleware('auth')->group(function() {
    Route::get('travel/create','create')->name('travel.create');
    Route::post('travel/store', 'store')->name('travel.store');
    Route::get('travel/{id}', 'show')->name('travel.show')->where('id', '[0-9]+');
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

Route::controller(SettingController::class)->prefix('user')->middleware('auth')->group(function(){
    Route::get('/setting/show','show')->name('setting.show');
    Route::get('setting/{user_id}/edit','edit')->name('setting.edit');
    Route::post('setting/{user_id}/update','update')->name('setting.update');
});


// パスワードリセット関連
Route::prefix('password_reset')->name('password_reset.')->group(function () {
    Route::prefix('email')->name('email.')->group(function () {
        // パスワードリセットメール送信フォームページ
        Route::get('/', [PasswordController::class, 'emailFormResetPassword'])->name('form');
        // メール送信処理
        Route::post('/', [PasswordController::class, 'sendEmailResetPassword'])->name('send');
        // メール送信完了ページ
        Route::get('/send_complete', [PasswordController::class, 'sendComplete'])->name('send_complete');
    });
    // パスワード再設定ページ
    Route::get('/edit', [PasswordController::class, 'edit'])->name('edit');
    // パスワード更新処理
    Route::post('/update', [PasswordController::class, 'update'])->name('update');
    // パスワード更新終了ページ
    Route::get('/edited', [PasswordController::class, 'edited'])->name('edited');
});







// //パスワードリセットリンクをリクエストするために必要なルート
// Route::get('/forgot-password', function () {
//     return view('auth.passwords.email');
// })->middleware('guest')->name('password.request');





// //「パスワードを忘れた」ビューからのフォーム送信リクエストを処理するルート
// Route::post('/forgot-password', function (Request $request) {
//     $request->validate(['email' => 'required|email']);

//     $status = Password::sendResetLink(
//         $request->only('email')
//     );

//     return $status === Password::RESET_LINK_SENT
//                 ? back()->with(['status' => __($status)])
//                 : back()->withErrors(['email' => __($status)]);
// })->middleware('guest')->name('password.email');





// //電子メールで送信されたパスワードリセットリンクをユーザーがクリックして新しいパスワードを入力したときに、実際にパスワードをリセットするために必要なルート
// Route::get('/reset-password/{token}', function ($token) {
//     return view('auth.passwords.reset', ['token' => $token]);
// })->middleware('guest')->name('password.reset');





// //パスワードリセットフォームの送信を実際に処理するためルート
// Route::post('/reset-password', function (Request $request) {
//     $request->validate([
//         'token' => 'required',
//         'email' => 'required|email',
//         'password' => 'required|min:8|confirmed',
//     ]);

//     $status = Password::reset(
//         $request->only('email', 'password', 'password_confirmation', 'token'),
//         function ($user, $password) {
//             $user->forceFill([
//                 'password' => Hash::make($password)
//             ])->setRememberToken(Str::random(60));

//             $user->save();

//             event(new PasswordReset($user));
//         }
//     );
    
//     return $status === Password::PASSWORD_RESET
//                 ? redirect()->route('login')->with('status', __($status))
//                 : back()->withErrors(['email' => [__($status)]]);
// })->middleware('guest')->name('password.update');

