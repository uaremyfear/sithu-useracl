<?php

Route::get('acl/test', function () {
	return 'Test';
});

Route::get('/acl',function ()
{
	return 'hreer';
});

Route::group(['middleware' => ['web','role:SuperAdmin']], function() {
	Route::get('/acl/hello','\Sithu\UserAcl\Http\Controllers\UserProfileController@testHello');

	Route::get('/changemypassword','\Sithu\UserAcl\Http\Controllers\PasswordController@showChangePasswordForm');
	Route::post('/changemypassword','\Sithu\UserAcl\Http\Controllers\PasswordController@updateChangePassword');

	Route::resource('/role','\Sithu\UserAcl\Http\Controllers\RoleController');
	Route::resource('/permission','\Sithu\UserAcl\Http\Controllers\PermissionController');
	Route::resource('/user','\Sithu\UserAcl\Http\Controllers\UserController');

	Route::get('/changepassword/user/{id}','\Sithu\UserAcl\Http\Controllers\UserController@changePassword');
	Route::post('/changepassword/user/{id}','\Sithu\UserAcl\Http\Controllers\UserController@updatePassword'); 
});

