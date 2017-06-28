<?php
namespace zongphp\cache;

use zongphp\arr\Arr;
use zongphp\config\Config;

class Cache {
	//连接
	protected $link = null;

	//更改缓存驱动
	protected function driver( $driver = null ) {
		static $cache = [ ];
		$driver = $driver ?: Config::get( 'cache.driver' );
		$driver = '\zongphp\cache\\build\\' . ucfirst( $driver );
		if ( ! isset( $cache[ $driver ] ) ) {
			$cache[ $driver ] = new $driver();
		}
		$this->link = $cache[ $driver ];
		$this->link->connect();

		return $this;
	}

	public function __call( $method, $params ) {
		if ( is_null( $this->link ) ) {
			$this->driver();
		}
		if ( method_exists( $this->link, $method ) ) {
			return call_user_func_array( [ $this->link, $method ], $params );
		}
	}

	public static function __callStatic( $name, $arguments ) {
		return call_user_func_array( [ new static(), $name ], $arguments );
	}
}