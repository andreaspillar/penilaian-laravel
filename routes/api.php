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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('apilogin','AuthController@login');
Route::post('signup','AuthController@signup');
Route::resource('kriteriaapi', 'KriteriaAPI');

Route::middleware('auth:api')->group(function(){
    Route::get('logout','AuthController@logout');
    Route::get('user','AuthController@user');
});
