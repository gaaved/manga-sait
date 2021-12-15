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


//Route::resource('{id}/coment', '\App\Http\Controllers\ComentController');

Route::get('post', 'App\Http\Controllers\PostController@index');

Route::get('/{id}/read', 'App\Http\Controllers\PostController@setRead');
// Route::post('/coment', '\App\Http\Controllers\ComentController@setComent');

Route::post('/coment', '\App\Http\Controllers\ComentController@setComent');
Route::post('/comentMangaPage', '\App\Http\Controllers\ComentController@setComentMangaPage');
Route::post('/comentLike', '\App\Http\Controllers\ComentLikeController@setComentLike');
Route::post('/comentDizLike', '\App\Http\Controllers\ComentLikeController@setComentDizLike');
Route::post('/comentOtvLike', '\App\Http\Controllers\ComentLikeController@setComentOtvLike');
Route::post('/comentOtvDizLike', '\App\Http\Controllers\ComentLikeController@setComentOtvDizLike');

Route::post('/comentPreLike', '\App\Http\Controllers\ComentLikeController@setComentPreLike');
Route::post('/comentPreDizLike', '\App\Http\Controllers\ComentLikeController@setComentPreDizLike');
Route::post('/comentPreOtvLike', '\App\Http\Controllers\ComentLikeController@setComentPreOtvLike');
Route::post('/comentPreOtvDizLike', '\App\Http\Controllers\ComentLikeController@setComentPreOtvDizLike');




Route::post('/comentOtvet', '\App\Http\Controllers\ComentController@setComentOtvet');
Route::post('/comentOtvetMangaPage', '\App\Http\Controllers\ComentController@setComentOtvetMangaPage');

Route::get('/{id}/delComent', 'App\Http\Controllers\ComentController@delComent');
Route::get('/{id}/delComentManga', 'App\Http\Controllers\ComentController@delComentManga');
Route::get('/{id}/delComentLike', 'App\Http\Controllers\ComentLikeController@delComentLike');
Route::get('/{id}/delComentDizLike', 'App\Http\Controllers\ComentLikeController@delComentDizLike');
Route::get('/{id}/delComentOtvLike', 'App\Http\Controllers\ComentLikeController@delComentOtvLike');
Route::get('/{id}/delComentOtvDizLike', 'App\Http\Controllers\ComentLikeController@delComentOtvDizLike');

Route::get('/{id}/delComentPreLike', 'App\Http\Controllers\ComentLikeController@delComentPreLike');
Route::get('/{id}/delComentPreDizLike', 'App\Http\Controllers\ComentLikeController@delComentPreDizLike');
Route::get('/{id}/delComentPreOtvLike', 'App\Http\Controllers\ComentLikeController@delComentPreOtvLike');
Route::get('/{id}/delComentPreOtvDizLike', 'App\Http\Controllers\ComentLikeController@delComentPreOtvDizLike');


Route::get('/{id}/delComentOtvet', 'App\Http\Controllers\ComentController@delComentOtvet');
Route::get('/{id}/delComentOtvetMangaPage', 'App\Http\Controllers\ComentController@delComentOtvetMangaPage');


Route::get('/{id}/viewNew', 'App\Http\Controllers\ComentController@viewNew');
Route::get('/{id}/viewNewMangaPage', 'App\Http\Controllers\ComentController@viewNewMangaPage');

Route::get('/{id}/viewNewOtvet', 'App\Http\Controllers\ComentController@viewNewOtvet');
Route::get('/{id}/viewNewOtvetmangaPage', 'App\Http\Controllers\ComentController@viewNewOtvetMangaPage');

Route::get('/manga/{id}', 'App\Http\Controllers\PostController@manga');

// Route::get('/mangaRead/{id}/{glava?}/{page?}', 'App\Http\Controllers\PostController@mangaRead');



Route::get('/mangaRead/{id}/{glava?}/{page?}', 'App\Http\Controllers\PostController@mangaRead');

// Route::get('image-upload', 'App\Http\Controllers\ImageUploadController@imageUpload')->name('image.upload');
Route::post('image-upload', 'App\Http\Controllers\UserUploadController@imageUploadPost');
Route::post('name-upload', 'App\Http\Controllers\UserUploadController@nameUploadPost');

Route::get('myakk', 'App\Http\Controllers\UserController@userindex');

Route::get('/strangerakk/{id}', 'App\Http\Controllers\UserController@strangerakk');


Route::get('register', '\App\Http\Controllers\AuthController@getRegisterForm');
Route::post('register', '\App\Http\Controllers\AuthController@register');
Route::get('login', '\App\Http\Controllers\AuthController@getLoginForm');
Route::post('login', '\App\Http\Controllers\AuthController@login');
Route::get('logout', '\App\Http\Controllers\AuthController@logout');