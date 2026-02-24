<?php

class Model
{
    protected static $table;

    public static function all()
    {
        $pdo = Database::connect();
        $table = static::$table;

        $stmt = $pdo->query("SELECT * FROM $table");

        return $stmt->fetchAll();
    }

    public static function find($id)
    {
        $pdo = Database::connect();
        $table = static::$table;

        $stmt = $pdo->prepare("SELECT * FROM $table WHERE id = ?");
        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    public static function create($data)
    {
        $pdo = Database::connect();
        $table = static::$table;

        $keys = array_keys($data);
        $values = array_values($data);

        $columns = implode(',', $keys);
        $placeholders = implode(',', array_fill(0,count($keys),'?'));

        $stmt = $pdo->prepare(
            "INSERT INTO $table ($columns) VALUES ($placeholders)"
        );

        $stmt->execute($values);
    }
}