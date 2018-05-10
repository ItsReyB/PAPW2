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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/Login', function () {
    return view('Login');
});

Route::get('/Inicio', ['uses' => 'Controller@getReviews']);

Route::get('/Profile',['uses'=>'Controller@getProfile']);

Route::get('/Review', ['uses'=>'Controller@getReview']);

Route::get('/Search', function () {
    return view('Search');
});
Route::get('/SearchAdmin', function () {
    return view('SearchAdmin');
});
