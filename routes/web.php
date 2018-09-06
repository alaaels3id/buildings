<?php

Route::get('/', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/admin-panal/login', 'Auth\AdminLoginController@showLoginForm')->name('admin-panal.login');
Route::post('/admin-panal/login', 'Auth\AdminLoginController@login')->name('admin-panal.login.submit');

Route::group(['middleware' => 'auth:admin'], function() 
{   
    //==================================================================================
    //dataTables routes
    //==================================================================================

    Route::get('admin-panal/users/data', 'UserController@anyData');
    Route::get('admin-panal/buildings/data', 'BuController@anyData');
    Route::get('admin-panal/contactus/data', 'ContactusController@anyData');
    
    //==================================================================================
    //admin routes
    //==================================================================================
    
    Route::post('/admin-panal/buildings/statistics/', 'AdminController@ShowStatisticsByYear');
    Route::post('admin-panal/users/PasswordChange', 'UserController@updatePassword');

    Route::get('/admin-panal', 'AdminController@index')->name('admin-panal');

    Route::get('/admin-panal/buildings/statistics', 'AdminController@ViewBuStatistics');

    Route::get('/admin-panal/profile/{admin}', 'AdminController@AdminProfile')->name('admin-profile');
    Route::patch('/admin-panal/profile/{id}', 'AdminController@update')->name('admin-panal.update');

    Route::get('/admin-panal/users/{user_id}/destroy', 'UserController@destroy');

    Route::resource('admin-panal/buildings', 'BuController', ['except' => ['index', 'show']]);
    Route::resource('/admin-panal/users', 'UserController');
    Route::resource('/admin-panal/contactus', 'ContactusController');

    Route::get('/admin-panal/contactus/{id}/destroy', 'ContactusController@destroy');
    Route::get('/admin-panal/settings', 'SettingsController@index');

    Route::get('admin-panal/buildings/{id?}', 'BuController@index');

    Route::get('/admin-panal/buildings/{id}/destroy', 'BuController@destroy');
    Route::get('/admin-panal/ChangeStatus/{id}/{status}', 'BuController@ChangeStatus');

    Route::post('/admin-panal/settings/', 'SettingsController@store');

    //==================================================================================
    //Softdeletes routes
    //==================================================================================   
    
    Route::get('/admin-panal/buildings/{id}/restore', 'BuController@restore')->name('buildings.restore');
    Route::get('/admin-panal/buildings/get/trashed', 'BuController@getTrashed')->name('buildings.trash');
    Route::get('/admin-panal/buildings/{id}/ForceDelete', 'BuController@ForceDelete')->name('buildings.forcedelete');
});

//==================================================================================
//website side routes
//==================================================================================

Route::group(['middleware' => 'web'], function() 
{
    Route::get('/home', 'HomeController@index');
    Route::get('/ajax/buildings/information/', 'HomeController@getajaxinformation')->middleware('auth');

    Route::view('/contact-us', 'pages.contact-us')->middleware('auth');
    Route::post('/contact-us', 'ContactusController@store');

    Route::view('/services', 'pages.services');
    Route::view('/about', 'pages.about');

    Route::get('/profile/{user}', 'HomeController@profile');

    Route::get('/buildings', 'BuController@buildings')->name('buildings');
    Route::get('buildings/search', 'BuController@search');
    Route::get('buildings/ForRent', 'BuController@ForRent')->middleware('auth');
    Route::get('buildings/ForBuy', 'BuController@ForBuy')->middleware('auth');
    Route::get('buildings/type/{type}', 'BuController@ShowByType')->middleware('auth');
    Route::get('buildings/build/{build_id}', 'BuController@build')->name('build')->middleware('auth');

    Route::get('/store/make/order/type/{type}/i/{id}', 'BuController@Order')->name('makeorder')->middleware('auth');
    Route::post('/store/make/order/', 'BuController@Rent')->name('rent')->middleware('auth');

    Route::view('/user/create/building', 'user.add')->middleware('auth');
    Route::post('/user/create/building', 'BuController@userStore')->middleware('auth');

    Route::get('/profile/{user}/active', 'BuController@UserActiveBuildings')->middleware('auth');
    Route::get('/profile/{user}/disactive', 'BuController@UserDisactiveBuildings')->middleware('auth');;
    Route::get('/profile/{user}/orders', 'BuController@UserOrders')->middleware('auth');;
    Route::get('/profile/{username}/edit/', 'UserController@EditUserProfile')->middleware('auth');

    Route::post('/user/ChangePassword', 'UserController@UserChangePasssword')->middleware('auth');
    Route::get('/buildings/build/{id}/edit', 'BuController@UserEditBuilding')->name('build.edit')->middleware('auth');

    Route::patch('/user/UpdateUserData/', ['as' => 'user.UpdateUserData', 'uses' => 'UserController@UpdateUserData'])->middleware('auth');
    Route::patch('/user/update/building', 'BuController@UserUpdateBuilding')->middleware('auth');
});



