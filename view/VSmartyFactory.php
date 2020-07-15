<?php

/**
 * Class VSmartyFactory
 * Contiene metodi per la creazione di oggetti Smarty con parametri "base" già assegnati (utente, path, messaggi di errore...)
 */
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

    /**
     * Ritorna l'oggetto Smarty passato come parametro con assegnati i parametri della ricerca dell'array parameters
     * Nel caso dei parametri fossero assenti, li imposta come "notSetted" per i parametri testuali e a valori standard per quelli numerici
     * @param Smarty $smarty
     * @param array $parameters
     * @return Smarty
     */
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
            $smarty->assign('pmin', 0);
        else $smarty->assign('pmin',$parameters['pmin']);
        if(!key_exists('pmax', $parameters))
            $smarty->assign('pmax', 1000000);
        else $smarty->assign('pmax',$parameters['pmax']);
        if(!key_exists('gmin', $parameters))
            $smarty->assign('gmin', 0);
        else $smarty->assign('gmin',$parameters['gmin']);
        if(!key_exists('gmax', $parameters))
            $smarty->assign('gmax', 2000);
        else $smarty->assign('gmax',$parameters['gmax']);
        return $smarty;
    }

    /**
     * Ritorna un'array di stringhe della tipologia "TipoAnnuncio" della ricerca
     * In posizione 0 è presente la tipologia passata come parametro
     * @param string $selected
     * @return array|string[]
     */
    public static function listTipoAnnuncio(string $selected):array
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

    /**
     * Ritorna un'array di stringhe della tipologia "Tipologia" della ricerca
     * In posizione 0 è presente la tipologia passata come parametro
     * @param string $selected
     * @return array|string[]
     */
    public static function listTipologie(string $selected):array
    {
        $tipologie=array("Tutte le Tipologie","Monolocale","Bilocale", "Trilocale","Quadrilocale","Appartamento" ,"Villa","Mansarda","Garage","Locale");
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

}