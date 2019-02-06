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

Route::post('user/register', 'API\RegisterController@register');
Route::post('user/login', 'API\LoginController@login');

// Route::middleware('jwt.auth')->get('users', function(Request $request) {
//     return auth()->user();
// });

Route::get('/v1/clients', 'api\ClientController@index');
Route::get('/v1/clients/{id}', 'api\ClientController@show');
Route::post('/v1/clients/follow', 'api\ClientController@follow');
Route::post('/v1/clients/refer', 'api\ClientController@refer');
Route::post('/v1/clients/share', 'api\ClientController@share');

Route::get('/v1/missions', 'api\MissionController@index');
Route::get('/v1/missions/{id}', 'api\MissionController@show');
Route::get('/v1/missions/client/{id}', 'api\MissionController@showByClient');
Route::get('/v1/missions/accept', 'api\MissionController@accept');
Route::post('/v1/missions/complete', 'api\MissionController@complete');

Route::get('/v1/rewards', 'api\RewardController@index');
Route::get('/v1/rewards/{id}', 'api\RewardController@show');
Route::get('/v1/rewards/{id}/redeem', 'api\RewardController@redeem');

Route::get('/v1/profile', 'api\ProfileController@index');
Route::get('/v1/profile/pointbalance', 'api\ProfileController@balance');
Route::get('/v1/profile/edit', 'api\ProfileController@edit');

