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


Route::get('/Login', ['uses' => 'Controller@getLogin']);


Route::get('/Inicio', ['uses' => 'Controller@getReviews']);

Route::get('/Profile',['uses'=>'Controller@getProfile']);

Route::get('/Review', ['uses'=>'Controller@getReview']);

Route::get('/Search', ['uses'=>'Controller@getSearch']);

Route::get('/SearchAdmin', ['uses'=>'Controller@getSearchAdmin']);
