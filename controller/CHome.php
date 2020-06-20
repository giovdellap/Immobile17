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
}