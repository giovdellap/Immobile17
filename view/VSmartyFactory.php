<?php


class VSmartyFactory
{
    public static function basicSmarty()
    {
        $smarty = StartSmarty::configuration();
        $smarty->assign("path", $GLOBALS["path"]);
        $smarty->assign("utente", "visitatore");
        return $smarty;
    }

    public static function userSmarty(MUtente $utente)
    {
        $smarty = self::basicSmarty();
        $smarty->assign("utente", $utente);
        $smarty->assign("nomeutente", $utente->getNome() . $utente->getCognome());
        return $smarty;
    }
}