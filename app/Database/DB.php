<?php
/**
 * Created by PhpStorm.
 * User: altak
 * Date: 13.03.19
 * Time: 21:36
 */

namespace App\Database;


use App\Config;
use App\Singletone;
use PDO;

/**
 * Class DB
 * @package App\Database
 */
final class DB extends Singletone
{
    private $driver;

    protected function __construct()
    {
        parent::__construct();
        $this->driver = new PDO(
            Config::get('db.dsn'),
            Config::get('db.username'),
            Config::get('db.password'),
            Config::get('db.options')
        );
    }

    public function sql($sql, array $parameters = [])
    {
        $stm = $this->driver->prepare($sql);
        $this->bindValues($stm, $parameters);
        $stm->execute();

        return $stm;
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array([$this->driver, $name], $arguments);
    }

    private function __clone()
    {
    }

    private function __sleep()
    {
    }

    private function bindValues(\PDOStatement $statement, array $params)
    {
        foreach ($params as $name => $value) {
            $type = PDO::PARAM_STR;

            if (is_bool($value)) {
                $type = PDO::PARAM_BOOL;
            }

            if (is_int($value)) {
                $type = PDO::PARAM_INT;
            }

            $statement->bindValue(":$name", $value, $type);
        }
    }
}