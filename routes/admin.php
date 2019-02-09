<?php
/*--- ADMIN ROUTES -------------------------------------*/
Route::get('/', array('uses'=> 'Admin\AdminDashboardController@index'));