<?php


class CHome
{
    public static function homepage()
    {
        if($_SERVER["REQUEST_METHOD"] === 'GET')
        {
            $agenzia = FPersistentManager::visualizzaAgenzia('AZ1');
            $immobili = FPersistentManager::getImmobiliHomepage();
            if(CUtente::isLogged()) {
                $utente = CSessionManager::getUtenteLoggato();
                VHome::homepage(VSmartyFactory::userSmarty($utente), $agenzia, $immobili);
            }
            else VHome::homepage(VSmartyFactory::basicSmarty(), $agenzia, $immobili);
        }
        // ipotetico else
    }
    public static function aboutUs()
    {
        if($_SERVER["REQUEST_METHOD"] === 'GET')
        {
            $immobili = FPersistentManager::getImmobiliHomepage();
            if(CUtente::isLogged()) {
                $utente = CSessionManager::getUtenteLoggato();
                VHome::aboutUs(VSmartyFactory::userSmarty($utente),$immobili);
            }
            else VHome::aboutUs(VSmartyFactory::basicSmarty(),$immobili);
        }
        // ipotetico else
    }
}