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
//alias for the 'register' route
Route::get('/signup', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/signup', 'Auth\RegisterController@register');
Route::post('/signup-brand', 'Auth\RegisterController@registerWithBrand');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );
//Route::get('/home', 'HomeController@index')->name('home');

/*--- PUBLIC ROUTES ------------------------------------*/
Route::get('/', array('uses'=> 'Web\HomeController@index'));

Route::get('/support', function () {
    return view('support');
});

Route::get('/privacy', function () {
    return view('privacy');
});

Route::get('/terms', function () {
    return view('terms');
});

Route::get('/terms_web', function () {
    return view('webterms');
});

Route::get('/send_test_email', function(){
    Mail::raw('Sending emails with Mailgun and Laravel is easy!', function($message)
    {
        $message->subject('Mailgun and Laravel are awesome!');
        $message->from('no-reply@believer.io', 'Believer');
        $message->to('bgarner@gmail.com');
    });
    \Log::info("sent an email....");
});

Route::get('/{client_slug}', array('uses' => 'Web\ClientController@clientLandingPage'));

/*--- USER ROUTES --------------------------------------*/
// Route::get('/advocate', function () {
//     return ('welcome advocate');
// });

/*--- CLIENT ROUTES ------------------------------------*/
// Route::get('/brandadmin', function () {
//     return ('welcome brand admin');
// });









