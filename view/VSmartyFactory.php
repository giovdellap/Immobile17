<?php


class VSmartyFactory
{
    /**
     * Ritorna un oggetto Smarty con assegnati il percorso globale e utente = "visitatore
     * @return Smarty
     */
    public static function basicSmarty()
    {
        $smarty = StartSmarty::configuration();
        $smarty->assign("path", $GLOBALS["path"]);
        $smarty->assign("utente", "visitatore");
        return $smarty;
    }

    /**
     * Ritorna un oggetto Smarty con assegnati il percorso globale e l'utente passato come parametro
     * @param MUtente $utente
     * @return Smarty
     */
    public static function userSmarty(MUtente $utente)
    {
        $smarty = self::basicSmarty();
        $smarty->assign("utente", $utente);
        $smarty->assign("nomeutente", $utente->getNome() . $utente->getCognome());
        return $smarty;
    }

    /**
     * Ritorna un oggetto Smarty con assegnati il percorso globale, l'utente passato come parametro e una stringa di errore
     * @param MUtente $utente
     * @param string $error
     * @return Smarty
     */
    public static function errorSmarty(MUtente $utente, string $error)
    {
        $smarty = self::userSmarty();
        $smarty->assign("error", $error);
        return $smarty;
    }
}