<?php

//Route::resource('/admin', 'Admin\AdminDashboardController');
Route::get('/admin', array('uses' => 'Admin\DashboardController@index'));

Route::resource('/admin/clients', 'Admin\ClientController');
Route::post('/admin/updateClient', 'Admin\ClientController@updateClient');

Route::resource('/admin/rewards', 'Admin\RewardController');
Route::post('/admin/updateReward', 'Admin\RewardController@updateReward');
Route::post('/admin/toggleRewardPublish', 'Admin\RewardController@toggleStatus');

Route::resource('/admin/reports', 'Admin\ReportController');

Route::resource('/admin/settings', 'Admin\SettingsController');

Route::resource('/admin/profile', 'Admin\ProfileController');
