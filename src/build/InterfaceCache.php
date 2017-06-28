<?php
namespace zongphp\cache\build;

/**
 * 缓存处理接口
 * Interface InterfaceCache
 */
interface InterfaceCache {
	//连接驱动只运行一次
	public function connect();

	public function set( $name, $value, $expire );

	public function get( $name );

	public function del( $name );

	public function flush();
}