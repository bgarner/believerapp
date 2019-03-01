<?php

//dashboard
Route::get('/client', array('uses' => 'Client\DashboardController@index'));

//missions
Route::resource('/client/missions', 'Client\MissionController');
Route::post('/client/updateMission', 'Client\MissionController@updateMission');

//believers
Route::resource('/client/believers', 'Client\BelieverController');
Route::post('/client/updateBeliever', 'Client\BelieverController@updateBeliever');
Route::post('/client/uploadList', 'Client\BelieverController@uploadList');
//Route::post('/client/toggleRewardPublish', 'Client\BelieverController@toggleStatus');

//referrals
Route::resource('/client/referrals', 'Client\ReferralController');

//reporting
Route::resource('/client/reports', 'Client\ReportController');

//user nav
Route::resource('/client/settings', 'Client\SettingsController');
Route::resource('/client/profile', 'Client\ProfileController');
