<?php

/*
|--------------------------------------------------------------------------
| Route admin
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => '/admin', 'namespace' => 'Backend', 'middleware' => ['web', 'guest']], function() {

    Route::get('/', function() {
        return view('backend.home.index');
    })->name('admin.home');

    Route::group(['prefix' => '/user', 'namespace' => 'User'], function() {
       Route::group(['prefix' => '/auth'], function() {

           Route::get('/login', function() {
               return view('backend.user.auth.login');
           })->name('admin.login');

           Route::post('/login', 'AuthController@actionLogin');
           Route::post('/logout', 'AuthController@actionLogout')->name('admin.logout');

       });

        Route::match(['get', 'put'], '/profile', 'ProfileController@index')->name('admin.user.profile');
    });

    Route::match(['get', 'put'], '/option', 'OptionController@index')->name('admin.option');

    Route::get('/sliders', 'SliderController@index')->name('admin.slider.index');
    Route::match(['get', 'post'], '/slider/create', 'SliderController@create')->name('admin.slider.create');
    Route::match(['get', 'put'], '/slider/update', 'SliderController@update')->name('admin.slider.update');
    Route::delete('/slider/delete', 'SliderController@delete')->name('admin.slider.delete');
});


Route::get('/', function () {
    return view('welcome');
});
