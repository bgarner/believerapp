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

Route::post('/v1/clients', 'api\ClientController@index');
Route::post('/v1/clientsFollowedByUser', 'api\ClientController@clientsFollowedByUser');
Route::post('/v1/clients/show', 'api\ClientController@show');
Route::post('/v1/clients/follow', 'api\ClientController@follow');
Route::post('/v1/clients/unfollow', 'api\ClientController@unfollow');
Route::post('/v1/clients/refer', 'api\ClientController@refer');
Route::post('/v1/clients/share', 'api\ClientController@share');

Route::post('/v1/missions', 'api\MissionController@index');
Route::post('/v1/missions/show', 'api\MissionController@show');
Route::post('/v1/missions/client', 'api\MissionController@showByClient');
Route::post('/v1/missions/accept', 'api\MissionController@accept');
Route::post('/v1/missions/complete', 'api\MissionController@complete');

Route::post('/v1/profile', 'api\ProfileController@show');
Route::post('/v1/profile/history', 'api\ProfileController@challengeHistory');
Route::post('/v1/profile/pointbalance/', 'api\ProfileController@balance');
Route::post('/v1/profile/edit', 'api\ProfileController@edit');

Route::post('/v1/messages', 'api\MessagesController@index');
Route::post('/v1/messages/show', 'api\MessagesController@show');
Route::post('/v1/messages/delete', 'api\MessagesController@delete');

Route::post('/v1/rewards', 'api\RewardController@index');
Route::post('/v1/rewards/show', 'api\RewardController@show');
Route::post('/v1/rewards/redeem', 'api\RewardController@redeem');

Route::post('/v1/referral/create', 'api\ReferralController@create');
