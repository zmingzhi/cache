<?php
namespace zongphp\cache\build;

use Exception;
use zongphp\config\Config;

/**
 * Redis缓存处理类
 * Class Redis
 */
class Redis implements InterfaceCache {
	use Base;
	protected $link;

	//连接
	public function connect() {
		$conf       = Config::get( 'cache.redis' );
		$this->link = new Redis();
		if ( $this->link->connect( $conf['host'], $conf['port'] ) ) {
			throw new Exception( "Redis 连接失败" );
		}
		$this->link->auth( $conf['password'] );
		$this->link->select( $conf['database'] );
	}

	//设置
	public function set( $name, $value, $expire = 3600 ) {
		if ( $this->link->set( $name, $value ) ) {
			return $this->link->expire( $name, $expire );
		}
	}

	//获得
	public function get( $name ) {
		return $this->link->get( $name );
	}

	//删除
	public function del( $name ) {
		return $this->link->del( $name );
	}

	//清空缓存池
	public function delAll() {
		return $this->link->flushall();
	}

	//清除缓存
	public function flush() {

	}
}