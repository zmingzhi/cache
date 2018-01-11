<?php
namespace zongphp\cache;

use zongphp\framework\build\Facade;

class CacheFacade extends Facade {
	public static function getFacadeAccessor() {
		return 'Cache';
	}
}
