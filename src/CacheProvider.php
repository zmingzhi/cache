<?php
namespace zongphp\cache;

use zongphp\framework\build\Provider;

class CacheProvider extends Provider {
	//延迟加载
	public $defer = true;

	public function boot() {
	}

	public function register() {
		$this->app->single( 'Cache', function () {
			return new Cache();
		} );
	}
}