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

Route::get('/', 'Controller@starter');
Route::post('/add-chat','Controller@newChat');
Route::get('/list-chat','Controller@listChat');
Route::get('/login','Controller@login');
Route::get('/fb-redirect','Controllers@fbRedirect');
Route::get('/fb-callback','Controller@fbCallback');
Route::post('/check-auth','Controller@checkAuth');
Route::get('noti-facebook','Controller@postFb');
Route::get('/tructiep/{alias}','Controller@showMatch');
Route::get('starter','Controller@starter');
Route::group(['midware'=>'web','prefix'=>'dashboard'],function(){
  Route::get('/club/create','DashboardController@createClub');
  Route::get('/club/list','DashboardController@listClub');
  Route::post('/club/add','DashboardController@addClub');
  Route::get('/leaguage/create','DashboardController@createLeaguage');
  Route::get('/leaguage/list','DashboardController@listLeaguage');
  Route::post('/leaguage/add','DashboardController@addLeaguage');
  Route::get('/match/create','DashboardController@createMatch');
  Route::get('/match/list','DashboardController@listMatch');
  Route::post('/match/add','DashboardController@addMatch');
  Route::post('/match/change-status','DashboardController@changeMatchStatus');
  Route::post('/match/delete/{match_id}','DashboardController@deleteMatch');
});
