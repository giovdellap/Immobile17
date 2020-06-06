<?php


abstract class FMedia
{
    private static string $table;
    private static string $values;
    private static string $id;

    public static abstract function bind(PDOStatement $stmt, $md, string $newId);

    /**
     * @return string
     */
    public static function getTable(): string
    {
        return self::$table;
    }

    /**
     * @return string
     */
    public static function getValues(): string
    {
        return self::$values;
    }


}