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

Route::get('/', 'Controller@home');
Route::post('/add-chat','Controller@newChat');
Route::get('/list-chat','Controller@listChat');
Route::get('/login','Controller@login');
Route::get('/fb-redirect','Controllers@fbRedirect');
Route::get('/fb-callback','Controller@fbCallback');
Route::post('/check-auth','Controller@checkAuth');
