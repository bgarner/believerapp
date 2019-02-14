<?php
/*--- ADMIN ROUTES -------------------------------------*/
Route::get('/admin', array('uses'=> 'Admin\AdminDashboardController@index'));


Route::get('/admin/clients', array('uses'=> 'Admin\ClientController@index'));

Route::get('/admin/rewards', array('uses'=> 'Admin\RewardController@index'));

Route::get('/admin/reports', array('uses'=> 'Admin\ReportController@index'));