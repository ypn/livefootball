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
Route::get('/list-chat','Controller@listChat');
Route::get('/login','Controller@login');
Route::get('/fb-redirect','Controllers@fbRedirect');
Route::get('/fb-callback','Controller@fbCallback');
Route::post('/check-auth','Controller@checkAuth');
Route::get('noti-facebook','Controller@postFb');
Route::get('/tructiep/{alias}','Controller@showMatch');
Route::get('/lich-truc-tiep','Controller@starter');
Route::get('/logout','Controller@logout');
Route::get('/coin','CoinController@show');
Route::get('/napthe','CoinController@napthe');
Route::group(['middleware'=>'web','prefix'=>'transition'],function(){
  Route::post('/add-to-debt','CoinController@addToDebt');
  Route::post('/expire-month-ticket','CoinController@expireMonthTicket');
  Route::post('/buy-match','CoinController@buyMatch');
});
Route::get('/profile','Controller@viewProfile');
Route::post('/napthe',[
     'uses' => 'CoinController@napthe1',
     'as'   => 'napthe'
  ]);
Route::get('/list-videos','Controller@listVideos');
Route::get('/servers/{server_id}','Controller@getServer');

Route::group(['midware'=>'web','prefix'=>'chat'],function(){
  Route::post('check-role','ChatController@checkRole');
  Route::post('handler-violate','ChatController@halderViolate');
  Route::post('add-chat','ChatController@newChat');
  Route::post('check-baned-user','ChatController@checkBandedUser');
});

Route::group(['midware'=>'web','prefix'=>'dashboard'],function(){
  Route::get('/','DashboardController@listMatch');
  Route::group(['prefix'=>'permissions'],function(){
    Route::get('list','MembersController@listPermissions');
    Route::get('add/{id?}','MembersController@addPermission');
    Route::post('create/{id?}','MembersController@createPermission');
    Route::post('delete','MembersController@deletePermission');
    Route::post('add-user-role','MembersController@addUserRole');
  });

  Route::group(['prefix'=>'group_member'],function(){
    Route::get('list','MembersController@listRole');
    Route::get('add/{id?}','MembersController@addRole');
    Route::get('view/{id}','MembersController@viewRole');
    Route::post('create/{id?}','MembersController@createRole');
    Route::post('delete','MembersController@deleteRole');
  });

  Route::post('user-role/delete','MembersController@deleteUserRole');

  Route::post('member/search','MembersController@search');

  Route::get('/club/create','DashboardController@createClub');
  Route::get('/club/list','DashboardController@listClub');
  Route::post('/club/add','DashboardController@addClub');

  Route::get('/leaguage/create','DashboardController@createLeaguage');
  Route::get('/leaguage/list','DashboardController@listLeaguage');
  Route::post('/leaguage/add','DashboardController@addLeaguage');

  Route::get('/match/create/{match_id?}','DashboardController@createMatch');
  Route::get('/match/review/{match_id}','DashboardController@matchReview');
  Route::post('/match/review/add','DashboardController@addMatchReview');
  Route::get('/match/list','DashboardController@listMatch');
  Route::post('/match/add/{match_id?}','DashboardController@addMatch');
  Route::post('/match/change-status','DashboardController@changeMatchStatus');
  Route::post('/match/change-server','DashboardController@changeMatchServer');
  Route::post('/match/show-notification','DashboardController@showMatchNotification');
  Route::post('/match/delete/{match_id}','DashboardController@deleteMatch');
  Route::post('/match/change-type','DashboardController@changeTypeMatch');

  Route::get('/shell-exec','DashboardController@shellExec');
  Route::post('/shell/exec','DashboardController@exec');
  Route::post('/shell/fb_exec','DashboardController@fbLive');
  Route::post('/shell/custom_exec','DashboardController@customExec');
  Route::get('/settings','DashboardController@settings');
  Route::post('/settings/add_id_live_video','DashboardController@addIdLiveVideo');
});
