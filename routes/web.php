<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );
//Route::get('/home', 'HomeController@index')->name('home');

/*--- PUBLIC ROUTES ------------------------------------*/
Route::get('/', array('uses'=> 'Web\HomeController@index'));

Route::get('/{client_slug}', array('uses' => 'Web\ClientController@clientLandingPage'));

/*--- USER ROUTES --------------------------------------*/
// Route::get('/advocate', function () {
//     return ('welcome advocate');
// });

/*--- CLIENT ROUTES ------------------------------------*/
// Route::get('/brandadmin', function () {
//     return ('welcome brand admin');
// });









