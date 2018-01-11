<?php
namespace zongphp\cache;

use zongphp\framework\build\Provider;


/**
 * 缓存服务提供者
 * Class CacheServiceProvider
 */
class CacheProvider extends Provider
{
    //延迟加载
    public $defer = false;

    public function boot()
    {
    }

    public function register()
    {
        $this->app->single('Cache', function () {
            return new Cache();
        });
    }
}
