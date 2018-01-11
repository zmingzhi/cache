<?php
namespace zongphp\cache\build;

/**
 * 缓存处理接口
 * Interface InterfaceCache
 *
 * @package zongphp\cache\build
 */
interface InterfaceCache
{
    /**
     * @return mixed
     */
    public function connect();

    /**
     * @param $name
     * @param $value
     * @param $expire
     *
     * @return mixed
     */
    public function set($name, $value, $expire);

    /**
     * @param $name
     *
     * @return mixed
     */
    public function get($name);

    /**
     * @param $name
     *
     * @return mixed
     */
    public function del($name);

    /**
     * @return mixed
     */
    public function flush();
}
