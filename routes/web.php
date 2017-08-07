<?php

Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('/', 'HomeController@index');
Auth::routes();

Route::group(['prefix' => 'provinces'], function () {
    Route::get('/', ['as' => 'provinceList', 'uses' => 'PagesController@provinces']);
    Route::get('/{name}', ['as' => 'provincePF', 'uses' => 'PagesController@provincePF']);
});

Route::group(['prefix' => '/user', 'middleware' => ['IsUser', 'auth']], function () {
    Route::get('profile/{id}', ['as' => 'user.profile', 'uses' => 'UserController@showProfile']);
    Route::post('profile/{id}', ['as' => 'user.update', 'uses' => 'UserController@updateProfile']);
});

Route::group(['prefix' => '/admin', 'middleware' => ['IsAdmin', 'auth']], function () {
    Route::get('/', ['as' => 'admin', 'uses' => 'PagesController@showAdmin']);
    Route::get('/user_list', ['as' => 'userList', 'uses' => 'AdminController@userList']);
    Route::get('/user_list/{id}', ['as' => 'block', 'uses' => 'AdminController@blockUser']);
    Route::get('/user_block', ['as' => 'userBlock', 'uses' => 'AdminController@userBlock']);
    Route::get('/user_block/{id}', ['as' => 'unblock', 'uses' => 'AdminController@unblockUser']);
    Route::get('/province_list', ['as' => 'provinceShowList', 'uses' => 'AdminController@provinceList']);
    Route::get('/province_add', ['as' => 'provinceGetAdd', 'uses' => 'AdminController@provinceGetAdd']);
    Route::post('/province_add', ['as' => 'provincePostAdd', 'uses' => 'AdminController@provincePostAdd']);
    Route::get('/province_delete/{id}', ['as' => 'provinceDelete', 'uses' => 'AdminController@provinceDelete']);
    Route::get('/province_edit/{id}', ['as' => 'provinceGetEdit', 'uses' => 'AdminController@provinceGetEdit']);
    Route::post('/province_edit/{id}', ['as' => 'provincePostEdit', 'uses' => 'AdminController@provincePostEdit']);
});
