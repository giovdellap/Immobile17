<?php


class CAdmin
{
    public static function homepage()
    {
        if(CUtente::isLogged())
        {
            if(CSessionManager::adminLogged())
            {
                if($_SERVER['REQUEST_METHOD'] == GET)
                {
                    $smarty = VSmartyFactory::adminSmarty(CSessionManager::getUtenteLoggato());
                    VAdmin::showHomepage($smarty);
                }
                else header('Location: ' . $GLOBALS['path'] . 'Admin/homepage');
            }
            //ERRORE DA VEDERE
        }
        else header('Location: ' . $GLOBALS['path'] . 'Utente/login');
    }

    public static function immobiliAttivi()
    {
        if(CUtente::isLogged())
        {
            if(CSessionManager::adminLogged())
            {
                if($_SERVER['REQUEST_METHOD'] == GET)
                {
                    $immobili = FPersistentManager::getImmobiliAttivi();
                    $smarty = VSmartyFactory::adminSmarty(CSessionManager::getUtenteLoggato());
                    VAdmin::showImmobili($smarty, $immobili);
                }
                else header('Location: ' . $GLOBALS['path'] . 'Admin/homepage');
            }
            //ERRORE DA VEDERE
        }
        else header('Location: ' . $GLOBALS['path'] . 'Utente/login');
    }

    public static function immobili()
    {
        if(CUtente::isLogged())
        {
            if(CSessionManager::adminLogged())
            {
                if($_SERVER['REQUEST_METHOD'] == GET)
                {
                    $immobili = FPersistentManager::visualizzaImmobili();
                    $smarty = VSmartyFactory::adminSmarty(CSessionManager::getUtenteLoggato());
                    VAdmin::showImmobili($smarty, $immobili);
                }
                else header('Location: ' . $GLOBALS['path'] . 'Admin/homepage');
            }
            //ERRORE DA VEDERE
        }
        else header('Location: ' . $GLOBALS['path'] . 'Utente/login');
    }

    public static function aggiungiImmobile()
    {
        if(CUtente::isLogged())
        {
            if(CSessionManager::adminLogged())
            {
                if($_SERVER['REQUEST_METHOD'] == GET)
                {
                    $smarty = VSmartyFactory::adminSmarty(CSessionManager::getUtenteLoggato());
                    VAdmin::showAggiuntaImmobile($smarty);
                }
                else if($_SERVER['REQUEST_METHOD'] == POST)
                {
                    $immobile = self::getImmobilebyPostRequest();
                    FPersistentManager::addImmobile($immobile);

                }
            }
            //ERRORE DA VEDERE
        }
        else header('Location: ' . $GLOBALS['path'] . 'Utente/login');
    }

    public static function visualizzaImmobile(string $id)
    {
        if(CUtente::isLogged())
        {
            if(CSessionManager::adminLogged())
            {
                if($_SERVER['REQUEST_METHOD'] == GET)
                {
                    $smarty = VSmartyFactory::adminSmarty(CSessionManager::getUtenteLoggato());
                    $immobile = FPersistentManager::visualizzaImmobile($id);
                    VAdmin::showImmobile($smarty, $immobile);
                }
                else if($_SERVER['REQUEST_METHOD'] == POST)
                {
                    $immobile = self::getImmobilebyPostRequest();
                    $immobile->setId($id);
                    FPersistentManager::modificaImmobile($immobile);
                    $smarty = VSmartyFactory::adminSmarty(CSessionManager::getUtenteLoggato());
                    VAdmin::showImmobile($smarty, $immobile);
                }
            }
            //ERRORE DA VEDERE
        }
        else header('Location: ' . $GLOBALS['path'] . 'Utente/login');
    }

    private static function getImmobilebyPostRequest(): MImmobile
    {
        $immobile = new MImmobile();
        $immobile->setNome($_POST['nome']);
        $immobile->setComune($_POST['comune']);
        $immobile->setIndirizzo($_SERVER['indirizzo']);
        $immobile->setGrandezza($_SERVER['grandezza']);
        $immobile->setPrezzo($_SERVER['prezzo']);
        $immobile->setDescrizione($_SERVER['descrizione']);
        $immobile->setTipoAnnuncio($_SERVER['tipoAnnuncio']);
        $immobile->setTipologia($_SERVER['tipologia']);
        $immobile->setAttivo($_SERVER['attivo']);
        return$immobile;
    }
}