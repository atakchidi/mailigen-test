<?php
/**
 * Created by PhpStorm.
 * User: altak
 * Date: 16.03.19
 * Time: 21:15
 */

return [
    'create table' => 'CREATE TABLE IF NOT EXISTS `LIST`
 (
     `id` INTEGER AUTO_INCREMENT PRIMARY KEY NOT NULL,
     `title` VARCHAR(255) NOT NULL,
     `email` VARCHAR(255) NOT NULL,
     `public_title` VARCHAR(255) NULL,
     `reminder` TEXT NULL,
     `is_sub` TINYINT(1) NOT NULL,
     `is_unsub` TINYINT(1) NOT NULL,
     `prefs_changed` TINYINT(1) NOT NULL
 ) ENGINE=innodb;'
];