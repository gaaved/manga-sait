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
// Route::get('/post', function () {
//     return view('post');
// });

Route::get('post', 'App\Http\Controllers\PostController@index');

Route::get('/{id}/read', 'App\Http\Controllers\PostController@setRead');

Route::get('/manga/{id}', 'App\Http\Controllers\PostController@manga');
Route::get('/mangaRead/{id}/', 'App\Http\Controllers\PostController@mangaRead');


Route::get('myakk', 'App\Http\Controllers\UserController@userindex');


Route::get('register', '\App\Http\Controllers\AuthController@getRegisterForm');
Route::post('register', '\App\Http\Controllers\AuthController@register');
Route::get('login', '\App\Http\Controllers\AuthController@getLoginForm');
Route::post('login', '\App\Http\Controllers\AuthController@login');
Route::get('logout', '\App\Http\Controllers\AuthController@logout');