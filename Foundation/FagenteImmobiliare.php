<?php


class FagenteImmobiliare extends FUtente
{
    private static string $table = "agente_immobiliare";
    private static string $idString = "AG";

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