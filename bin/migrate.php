#!/usr/bin/php

<?php
/**
 * Created by PhpStorm.
 * User: altak
 * Date: 16.03.19
 * Time: 21:36
 */

use App\Database\DB;
use Symfony\Component\Dotenv\Dotenv;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$dotenv = new Dotenv();
$dotenv->load(dirname(__DIR__) . '/.env');

$migrations = require dirname(__DIR__) . '/migrations.php';
echo 'Running Db migrations' . PHP_EOL;

$count = 0;
foreach ($migrations as $name => $sql) {
    echo $sql . PHP_EOL;
    $count += DB::getInstance()->exec($sql);
}

echo "Done. Affected rows: $count" . PHP_EOL ;
