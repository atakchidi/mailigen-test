<?php
/**
 * Created by PhpStorm.
 * User: altak
 * Date: 13.03.19
 * Time: 22:50
 */

namespace App\Manager;


use App\Database\DB;
use App\ValueObject\ListItem;
use PDO;
use PDOStatement;

class ListManager
{
    const TABLE = 'LIST';

    public static function create(ListItem $item)
    {
        $query = 'INSERT INTO `' . self::TABLE . '`'
            . '(`title`, `public_title`, `reminder`, `is_sub`, `is_unsub`, `prefs_changed`, `email`)'
            . ' VALUES (:title, :public_title, :reminder, :is_sub, :is_unsub, :prefs_changed, :email)';

        DB::getInstance()->sql($query, $item->toArray());
    }

    public static function updateEmail($id, $email)
    {
        $query = 'UPDATE `' . self::TABLE . '`'
            . 'SET email=:email'
            . ' WHERE id=:id';

        DB::getInstance()->sql($query, [
            'id' => $id,
            'email' => $email
        ]);
    }

    public static function update($id, ListItem $item)
    {
        $query = 'UPDATE `' . self::TABLE . '`'
            . ' SET title=:title, public_title=:public_title, reminder=:reminder, is_sub=:email_subscribe, is_unsub=:email_unsubscribe, prefs_changed=:email_preferences, email=:email'
            . ' WHERE id=:id';

        DB::getInstance()->sql($query, $item->toArray() + ['id' => $id]);
    }

    public static function all()
    {
        $tableName = self::TABLE;
        /** @var PDOStatement $statement */
        $statement = DB::getInstance()->query("SELECT * FROM $tableName");
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($data as &$item) {
            foreach ($item as $key => $value)
                if ($key !== 'id' && is_numeric($value)) {
                    $item[$key] = var_export((bool)$value, true);
                }
        }

        unset($item);

        return $data;
    }

    public static function find($id)
    {
        $tableName = self::TABLE;
        /** @var PDOStatement $statement */
        $statement = DB::getInstance()->sql("SELECT * FROM $tableName WHERE `id`= :id LIMIT 1", ['id' => $id]);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}