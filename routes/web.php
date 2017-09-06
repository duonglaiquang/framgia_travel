<?php

Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('/', 'HomeController@index');
Auth::routes();

Route::group(['prefix' => 'provinces'], function () {
    Route::get('/', ['as' => 'provinceList', 'uses' => 'PagesController@provinces']);
    Route::get('/{name}', ['as' => 'provincePF', 'uses' => 'PagesController@provincePF']);
    Route::post('/', ['as' => 'provinceSearch', 'uses' => 'PagesController@provinceSearch']);

    Route::get('{name}{id}/Hotels', ['as' => 'hotels', 'uses' => 'PagesController@hotelsList']);
    Route::get('{name}{id}/Hotels/{name1}', ['as' => 'hotelPF', 'uses' => 'PagesController@hotelPF']);

    Route::get('{name}{id}/Restaurants', ['as' => 'restaurants', 'uses' => 'PagesController@hotelsList']);
    Route::get('{name}{id}/Restaurants/{name1}', ['as' => 'restaurantPF', 'uses' => 'PagesController@hotelPF']);

    Route::get('{name}{id}/Activities', ['as' => 'activities', 'uses' => 'PagesController@hotelsList']);
    Route::get('{name}{id}/Activities/{name1}', ['as' => 'activityPF', 'uses' => 'PagesController@hotelPF']);

    Route::post('{name}{id1}/Service/{name1}', ['as' => 'comment', 'uses' => 'PagesController@comment', 'middleware' => 'auth']);
    Route::post('{name}{id1}/Service/{name1}/edit/{id}', ['as' => 'comment.edit', 'uses' => 'PagesController@editComment']);
    Route::get('{name}{id1}/Service/{name1}/delete/{id}', ['as' => 'comment.delete', 'uses' => 'PagesController@deleteComment']);
});

Route::get('/service{id}', ['as' => 'serviceList', 'uses' => 'PagesController@serviceList']);
Route::post('/service{id}', ['as' => 'serviceListSearch', 'uses' => 'PagesController@serviceListSearch']);

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

    Route::get('/service_list', ['as' => 'serviceShowList', 'uses' => 'AdminController@serviceList']);
    Route::get('/service_requested', ['as' => 'serviceRequested', 'uses' => 'AdminController@serviceRequested']);
    Route::get('/approved/{id}', ['as' => 'approved', 'uses' => 'AdminController@approveRequest']);
    Route::get('/canceled/{id}', ['as' => 'canceled', 'uses' => 'AdminController@cancelRequest']);
});

Route::group(['prefix' => '/action', 'middleware' => ['IsUser', 'auth']], function () {
    Route::get('/request', ['as' => 'requestGet', 'uses' => 'PagesController@requestGet']);
    Route::post('/request', ['as' => 'requestPost', 'uses' => 'PagesController@requestPost']);
    Route::get('/request/{id}/edit', ['as' => 'requestEditGet', 'uses' => 'PagesController@requestEditGet']);
    Route::post('/request/{id}/edit', ['as' => 'requestEditPost', 'uses' => 'PagesController@requestEditPost']);
    Route::get('/request%Service', ['as' => 'service.request', 'uses' => 'PagesController@requestService']);
    Route::post('/request%Service', ['as' => 'service.request.post', 'uses' => 'PagesController@requestServicePost']);
    Route::get('/request/{id}/delete', ['as' => 'requestDelete', 'uses' => 'PagesController@requestDelete']);
});

Route::get('/search{id}{id1}', ['as' => 'PFsearch', 'uses' => 'PagesController@PFsearch']);
Route::get('/service/{province_id}/{type_id}', ['as' => 'select-ajax', 'uses' => 'AjaxController@selectAjax']);

// OAuth Routes
Route::get('auth/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\LoginController@handleProviderCallback');
