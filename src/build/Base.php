<?php namespace zongphp\cache\build;

use zongphp\arr\Arr;
use zongphp\config\Config;

/**
 * 缓存服务基础类
 */
trait Base {
	//配置
	protected $config;

	//设置配置项
	public function config( $name ) {
		if ( is_array( $name ) ) {
			$this->config = $name;

			return $this;
		} else {
			return Arr::get( $this->config, $name );
		}

		return $this;
	}
}