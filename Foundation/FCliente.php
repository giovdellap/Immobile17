<?php


class FCliente extends FUtente
{
    private static string $table = "cliente";
    private static string $idString = "CL";

    public static function emailesistente(MUtente $utente): bool
    {
        $db=FDataBase::getInstance();
        return $db->existDB(self::class, "mail", $utente->getEmail());

    }

    public static function registrazione(MUtente $utente): bool
    {
        $db= FDataBase::getInstance();
        return $db->storeDb(self::class,$utente);
    }


}