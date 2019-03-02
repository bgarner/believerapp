<?php

//dashboard
Route::get('/client', array('uses' => 'Client\DashboardController@index'));

//missions
Route::resource('/client/missions', 'Client\MissionController');
Route::post('/client/updateMission', 'Client\MissionController@updateMission');

//believers
Route::get('/client/believers/invite', 'Client\BelieverController@invite');
Route::post('/client/believers/invite', 'Client\BelieverController@uploadInvites');
Route::get('/client/believers/audiences', 'Client\BelieverController@audiences');
Route::resource('/client/believers', 'Client\BelieverController');
Route::post('/client/updateBeliever', 'Client\BelieverController@updateBeliever');

//Route::post('/client/toggleRewardPublish', 'Client\BelieverController@toggleStatus');

//referrals
Route::resource('/client/referrals', 'Client\ReferralController');

//reporting
Route::resource('/client/reports', 'Client\ReportController');

//user nav
Route::resource('/client/settings', 'Client\SettingsController');
Route::resource('/client/profile', 'Client\ProfileController');
