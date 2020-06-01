<?php


class FAgenzia extends FObject
{
    private static string $table = "agenzia";
    private static string $values;
    private static string $idString = "AG";

    public static function bind(PDOStatement $stmt, $obj, string $newId)
    {
        // TODO: Implement bind() method.
    }

    public static function getAgenzia(string $id): MAgenzia
    {

    }

    public static function getImmobili(string $id): MAgenzia
    {
        $agenzia = self::getAgenzia($id);
        $agenzia->setListImmobili(FImmobile::getImmobili());
        return $agenzia;
    }
}