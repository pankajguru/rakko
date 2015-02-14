<?php
namespace App\Modules\ModuleManager\Providers;

use App;
use Config;
use Lang;
use View;
use Illuminate\Support\ServiceProvider;

class ModuleManagerServiceProvider extends ServiceProvider
{
	/**
	 * Register the ModuleManager module service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// This service provider is a convenient place to register your modules
		// services in the IoC container. If you wish, you may make additional
		// methods or service providers to keep the code more focused and granular.
		App::register('App\Modules\ModuleManager\Providers\RouteServiceProvider');

		$this->registerNamespaces();
	}

	/**
	 * Register the ModuleManager module resource namespaces.
	 *
	 * @return void
	 */
	protected function registerNamespaces()
	{
		Lang::addNamespace('ModuleManager', __DIR__.'/../Resources/Lang/');

		View::addNamespace('ModuleManager', __DIR__.'/../Resources/Views/');
	}

	/**
	 * Boot the service provider.
	 *
	 * @return void
	 */
	public function boot()
	{
	// Publish a config file
//dd("loaded");
		$this->mergeConfigFrom(
			__DIR__.'/../Config/modulemanager.php', 'module_manager.php'
			);

		$this->publishes([
			__DIR__.'/path/to/config/modulemanager.php' => config_path('modulemanager.php'),
		]);

		$this->publishes([
			__DIR__.'/../config/modulemanager.php', config_path('modulemanager.php')
		], 'config');

	}



}