<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

// Authorization Routes
Route::auth();

// Index Routes
Route::get('/', 'IndexController@getIndex')->name('index.index');

// Registration Routes
Route::get('registration/index', 'RegistrationController@getIndex')->name('registration.index');
Route::post('registration/confirmation', 'RegistrationController@postConfirmation')->name('registration.confirmation');
Route::post('registration/submit', 'RegistrationController@postSubmit')->name('registration.submit');
Route::get('registration/thanks', 'RegistrationController@getThanks')->name('registration.thanks');

// Admin Routes
Route::group(['middleware' => 'auth'], function () {
    Route::get('admin', 'AdminController@getIndex')->name('admin.index');
});