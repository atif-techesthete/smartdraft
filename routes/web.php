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

Route::get('/', [\App\Http\Controllers\HomeController::class,'index'])
    ->middleware('authorized')
    ->name('index');

Route::get('/login',[\App\Http\Controllers\HomeController::class,'login'])->name('auth.login');
Route::get('/oauth/redirect/{provider}',[\App\Http\Controllers\OauthController::class,'oauth_redirect'])
    ->name('ouath.redirect');

Route::get('/oauth/callback/{provider}/{code?}',[\App\Http\Controllers\OauthController::class,'oauth_callback'])
    ->name('oauth.callback');
