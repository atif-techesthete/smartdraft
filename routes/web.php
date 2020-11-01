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

/*
 * Home page Route
 */
Route::get('/', [\App\Http\Controllers\HomeController::class,'index'])
    ->middleware('authorized')
    ->name('index');

/*
 *          End here
*/



/*
 * ------------------------------- Login / Signup Routes -----
 */

Route::get('/login',[\App\Http\Controllers\AuthController::class,'login'])->name('auth.login');
Route::get('/signup',[\App\Http\Controllers\AuthController::class,'signup'])->name('auth.signup');
Route::get('/forgot-password',[\App\Http\Controllers\AuthController::class,'forgot_password'])->name('auth.forgot.password');


Route::post('/user/signup',[\App\Http\Controllers\AuthController::class,'signup'])->name('auth.signup.post');
Route::post('/user/login',[\App\Http\Controllers\AuthController::class,'login'])->name('auth.login.post');
Route::post('/user/forgotpassword',[\App\Http\Controllers\AuthController::class,'forgot_password'])->name('auth.forgot.password.post');


/*
 * -------------------------------- Login / Signup Routes ends here
 */

//auth.signup.post

/*
 * Oauth Routes -----------------starts ----------------
 */
Route::get('/oauth/redirect/{provider}',[\App\Http\Controllers\OauthController::class,'oauth_redirect'])
    ->name('ouath.redirect');

Route::get('/oauth/callback/{provider}/{code?}',[\App\Http\Controllers\OauthController::class,'oauth_callback'])
    ->name('oauth.callback');


/*
 * Oauth Routes ------------------ ends ----------------
 */
