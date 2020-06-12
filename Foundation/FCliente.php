<?php


class FCliente extends FUtente
{
    private static string $table = "cliente";
    private static string $idString = "CL";


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
    public static function getID():string
    {
        return self::$idString;
    }


}