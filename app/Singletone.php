<?php
/**
 * Created by PhpStorm.
 * User: altak
 * Date: 13.03.19
 * Time: 22:29
 */

namespace App;


abstract class Singletone
{
    protected static $instance = null;

    protected function __construct()
    {

    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    private function __clone()
    {
    }

    private function __sleep()
    {
    }
}