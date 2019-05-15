<?php

//dashboard
Route::get('/admin', array('uses' => 'Admin\DashboardController@index'));

//clients
Route::resource('/admin/clients', 'Admin\ClientController');
Route::post('/admin/updateClient', 'Admin\ClientController@update');
Route::resource('/admin/manager', 'Admin\ClientUserController');

//rewards
Route::resource('/admin/rewards', 'Admin\RewardController');
Route::post('/admin/updateReward', 'Admin\RewardController@updateReward');
Route::post('/admin/toggleRewardPublish', 'Admin\RewardController@toggleStatus');

//reports
Route::resource('/admin/reports', 'Admin\ReportController');

//user nav
Route::resource('/admin/settings', 'Admin\SettingsController');
Route::resource('/admin/profile', 'Admin\ProfileController');
