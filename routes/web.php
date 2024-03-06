<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;

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
    return view('index');
})->name('addCalendarEvent.index');

Route::get('/auth/google/signOut', 'Auth\LoginController@signOutGoogle')->name('auth.google.signOut');

Route::get('/auth/google', 'Auth\LoginController@redirectToProvider')->name('auth.google');
Route::get('google/auth/callback', 'Auth\LoginController@handleProviderCallback');