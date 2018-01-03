<?php

Route::get('acl/test', function () {
	return 'Test';
});

Route::get('/acl',function ()
{
	return 'hreer';
});

Route::group(['middleware' => ['web','role:SuperAdmin','auth'],'prefix'=> config('useracl-config.useracl.prefix') ], function() {
	Route::resource('/role','\Sithu\UserAcl\Http\Controllers\RoleController');
	Route::resource('/permission','\Sithu\UserAcl\Http\Controllers\PermissionController');
	Route::resource('/user','\Sithu\UserAcl\Http\Controllers\UserController');

	Route::get('/changepassword/user/{id}','\Sithu\UserAcl\Http\Controllers\UserController@changePassword')->name('userpassword.edit');
	Route::post('/changepassword/user/{id}','\Sithu\UserAcl\Http\Controllers\UserController@updatePassword')->name('userpassword.update'); 
});

Route::group(['middleware' => ['web','auth'],'prefix'=>'dcjl'],function ()
{
	Route::get('/changemypassword','\Sithu\UserAcl\Http\Controllers\PasswordController@showChangePasswordForm')->name('change.me');
	Route::post('/changemypassword','\Sithu\UserAcl\Http\Controllers\PasswordController@updateChangePassword')->name('change.password');
});

