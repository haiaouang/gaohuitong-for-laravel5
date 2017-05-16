<?php namespace Hht\Gaohuitong;

use Illuminate\Support\ServiceProvider;

class GaohuitongServiceProvider extends ServiceProvider
{

	/**
	 * 安装配置文件
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->publishes([
			__DIR__ . '/config/ght.php' => config_path('ght.php'),
		]);
	}
	
	/**
	 * 注册服务
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['gaohuitong'] = $this->app->share(function () {
			return new Gaohuitong();
		});
	}


	/**
	 * 获取服务
	 *
	 * @return array
	 */
	public function provides()
	{
		return ['gaohuitong'];
	}
}