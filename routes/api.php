<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

header('Access-Control-Allow-Origin: http://agenda.fe');
header('Access-Control-Allow-Credentials: true');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::group(['middleware' => 'web'], function(){
  Route::get('/contacts',       'ContactsController@index');
  Route::get('/get_token_csrf', 'ContactsController@token');
  Route::post('/data',          'ContactsController@saveText');
  Route::get('/getdata',        'ContactsController@getText');
});
