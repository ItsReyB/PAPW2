<?php

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


Route::get('/', ['uses' => 'Controller@getLogin']);
Route::get('/Login', ['uses' => 'Controller@getLogin']);

//Route::get('/Inicio', ['uses' => 'Controller@getReviews']);

//Route::get('/Profile',['uses'=>'Controller@getProfile']);

//Route::get('/Review', ['uses'=>'Controller@getReview']);

//Route::get('/Search', ['uses'=>'Controller@getSearch']);

Route::get('/SearchAdmin', ['uses'=>'Controller@getSearchAdmin']);

//---------------------------------------
Route::post('/Profile', 'DBcontroller@Signing');
Route::post('/editMP', 'DBcontroller@editMP');
Route::post('/delUser', 'DBcontroller@DelUser');
Route::post('/Inicio', 'DBcontroller@Logging');
Route::get('/LogOut', 'DBcontroller@LoggingOut');

Route::get('/Profile/{id}',['uses'=>'DBcontroller@getAProfile'])->where('id', '[0-9]+');

Route::get('/Review/{string}', ['uses'=>'DBcontroller@WriteReview'])->where('string','New');
Route::get('/Review/{id}', ['uses'=>'DBcontroller@ReadReview'])->where('id','[0-9]+');
Route::post('/delReview', 'DBcontroller@DelReview');

Route::post('/add', 'DBcontroller@Post');

Route::get('/Search', 'DBcontroller@Search');
Route::get('/Search/{Categoria}', ['uses'=>'DBcontroller@SearchCat'])->where('Categoria','[a-zA-Z]+');
Route::post('/Search', 'DBcontroller@AdSearch');

Route::get('/Inicio', 'DBcontroller@index');
Route::post('/Follow', 'DBcontroller@Followuser');
Route::post('/Like', 'DBcontroller@Likepost');

Route::post('/addComment', 'DBcontroller@Comment');
//---------------------------------------