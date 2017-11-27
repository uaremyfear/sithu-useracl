<?php

namespace Sithu\UserAcl;

use Illuminate\Support\ServiceProvider;

class UserAclServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->app->bind('sithu-useracl', function() {
			return new UserAcl;
		});

		// $this->mergeConfigFrom(
		// 	__DIR__ . '/config/main.php', 'sithu-adminlte-main'
		// 	);
	}

	public function boot()
	{
		// $this->publishes([
		// 	__DIR__ . '/config' => config_path('')
		// 	]);	

		require __DIR__ . '/Http/routes.php';

		$this->loadViewsFrom(__DIR__ . '/views', 'sithu-useracl');	
	}
}
