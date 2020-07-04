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
        $smarty->assign("error", "noError");
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
        $smarty->assign("nomeutente", $utente->getNome() . " " . $utente->getCognome());
        return $smarty;
    }

    public static function adminSmarty(MAmministratore $admin)
    {
        $smarty = self::basicSmarty();
        $smarty->assign("admin", $admin);
        return $smarty;
    }

    /**
     * Ritorna un oggetto Smarty con assegnati il percorso globale, l'utente passato come parametro e una stringa di errore
     * @param Smarty $smarty
     * @param string $error
     * @return Smarty
     */
    public static function errorSmarty(Smarty $smarty, string $error): Smarty
    {
        $smarty->assign("error", $error);
        return $smarty;
    }

    public static function searchBarSmarty(Smarty $smarty, array $parameters): Smarty
    {
        $parametersNames = array('ti', 'pc', 'tp');
        foreach ($parametersNames as $key)
        {
            if(!key_exists($key, $parameters))
                $parameters[$key]="notSetted";
            $smarty->assign($key, $parameters[$key]);
        }
        $smarty->assign("tipologie", self::listTipologie($parameters["tp"]) );
        $smarty->assign("tipoAnnuncio", self::listTipoAnnuncio($parameters["ti"]) );
        if(!key_exists('pmin', $parameters))
            $smarty->assign('pmin', 100);
        if(!key_exists('pmax', $parameters))
            $smarty->assign('pmax', 1000000);
        if(!key_exists('gmin', $parameters))
            $smarty->assign('gmin', 0);
        if(!key_exists('gmax', $parameters))
            $smarty->assign('gmax', 2000);
        return $smarty;
    }

    private static function listTipoAnnuncio(string $selected):array
    {
        $tipologie=array("Affitto e Vendita","Vendita", "Affitto");
        if (array_search($selected,$tipologie)==false)
            return $tipologie;
        else
        {
            $toReturn=array();
            $toReturn[]=$selected;
            foreach ($tipologie as $elem)
            {
                if ($elem!==$selected)
                    $toReturn[]=$elem;
            }
            return $toReturn;
        }
    }

    private static function listTipologie(string $selected):array
    {
        $tipologie=array("Tutte le Tipologie","Monolocale","Bilocale", "Villa","Mansarda","Garage","Locale");
        if (array_search($selected,$tipologie)==false)
            return $tipologie;
        else
        {
            $toReturn=array();
            $toReturn[]=$selected;
            foreach ($tipologie as $elem)
            {
                if ($elem!==$selected)
                    $toReturn[]=$elem;
            }
            return $toReturn;
        }
    }
    public static function isImage($typefile): bool
    {
        $estensione = strtolower(strrchr($typefile, '/'));

        switch($estensione) {
            case '/jpg':
            case '/jpeg':
            case '/gif':
            case '/png':
                return true;
            default:
                return false;
        }
    }

}