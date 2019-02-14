<?php
/*--- ADMIN ROUTES -------------------------------------*/
Route::get('/admin', array('uses'=> 'Admin\AdminDashboardController@index'));