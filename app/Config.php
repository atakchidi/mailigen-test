<?php
/**
 * Created by PhpStorm.
 * User: altak
 * Date: 13.03.19
 * Time: 21:43
 */

namespace App;


final class Config extends Singletone
{
    private static $config = [];

    protected function __construct()
    {
        parent::__construct();
        self::$config = require dirname(__DIR__) . '/config.php';
    }

    public static function get($key)
    {
        if (!$key) {
            return null;
        }

        self::getInstance();

        $value = self::$config;
        $parameters = explode('.', $key);

        foreach ($parameters as $parameter) {
            $value = isset($value[$parameter]) ? $value[$parameter] : null;
            if (!$value) {
                return $value;
            }
        }

        return $value;
    }

}