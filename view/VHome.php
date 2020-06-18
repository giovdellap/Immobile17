<?php


class VHome
{
    public static function homepage (MUtente $utente, MAgenzia $agenzia, array $immobili)
    {
        $smarty = StartSmarty::configuration();
        $smarty->assign("utente", $utente);
        $smarty->assign("nomeutente", $utente->getNome() . $utente->getCognome());
        self::viewHomepage($smarty, $agenzia, $immobili);


    }

    public static function visitorsHomepage(MAgenzia $agenzia, array $immobili)
    {
        $smarty = StartSmarty::configuration();
        self::viewHomepage($smarty, $agenzia, $immobili);
    }

    public static function viewHomepage($smarty, MAgenzia $agenzia, array $immobili)
    {
        $smarty->assign("path", $GLOBALS["path"]);
        $smarty->assign("agenzia", $agenzia);
        $smarty->assign("immobile0", $immobili[0]);
        $smarty->assign("immobile1", $immobili[1]);
        $smarty->assign("immobile2", $immobili[2]);
    }
}