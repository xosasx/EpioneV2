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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login/{provider}/{user_type?}', 'CustomAuth\LoginController@redirectToProvider')->name('login.social');
Route::get('login/{provider}/callback', 'CustomAuth\LoginController@handleProviderCallback');
Route::get('logout', 'CustomAuth\LoginController@logout')->name('logout');
Route::get('fitbit/login', 'CustomAuth\LoginController@handleRedirectToFitbit')->name('login.fitbit');

Route::group(['middleware' => ['verify.auth']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('confirm_fitbit', 'CustomAuth\LoginController@handleFitbitToLogin')->name('confirm.fitbit'); 
    //Route::get('/-/dashboard', 'ClientDashboardController@refreshInfo');
    //Route::post('/get/sleep', 'ClientDashboardController@sleepInfo');

    // Route::group(['prefix' => 'client', 'middleware' => ['verify.fitbitToken']], function () {   
    //     Route::get('dashboard', 'ClientDashboardController@index')->name('dashboard.client');
    //     Route::post('update/profile', 'ClientDashboardController@updateInfo')->name('update.client');
    //     Route::post('sleep/get', 'ClientDashboardController@sleepInfo')->name('sleep.get.client');
    //     Route::get('/-/dashboard', 'ClientDashboardController@refreshInfo')->name('refresh.client');
    // });
    
});

Route::group(['prefix' => 'client'], function () {   
        Route::get('dashboard', 'ClientDashboardController@index')->name('dashboard.client');
        Route::post('update/profile', 'ClientDashboardController@updateInfo')->name('update.client');
        Route::post('sleep/get', 'ClientDashboardController@sleepInfo')->name('sleep.get.client');
        Route::get('-/dashboard', 'ClientDashboardController@refreshInfo')->name('refresh.client');
        Route::post('selectCarer', 'ClientDashboardController@selectCarer')->name('set.carer.client');
        Route::get('loadCarers', 'ClientDashboardController@loadCarers')->name('load.carers.client');
        Route::post('notification/send', 'ClientDashboardController@send_notification')->name('send.notification.client');
});

Route::group(['prefix' => 'carer'], function () {   
    Route::get('dashboard', 'CarerDashboardController@index')->name('dashboard.carer');
    Route::get('notification', 'CarerDashboardController@notification')->name('notification.carer');
    Route::post('notification/update-response', 'CarerDashboardController@update_response_notification')->name('update.response.notification.carer');   
    Route::post('get-notes', 'CarerDashboardController@getNotes')->name('get.notes.carer');
    Route::post('send-note', 'CarerDashboardController@sendNote')->name('send.note.carer');
    Route::post('delete-note', 'CarerDashboardController@deleteNote')->name('delete.note.carer');
});

Route::get('/ftest', 'FirebaseController@test');