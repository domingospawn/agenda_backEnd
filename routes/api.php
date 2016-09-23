<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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

Log::info('Routes api');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::group(['middleware' => 'cors'], function(){
  Log::info('routes middleware cors group');

  //Route::match(['options'], '/data', 'ContactsController@saveText')->middleware('cors');
  Route::get('/contacts',       'ContactsController@index');
  Route::post('/contacts',      'ContactsController@newContact');
  Route::get('/get_token_csrf', 'ContactsController@token');
  Route::post('/data',          'ContactsController@saveText');
  Route::get('/getdata',        'ContactsController@getText');
});
