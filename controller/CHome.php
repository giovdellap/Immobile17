<?php


class CHome
{
    public static function homepage()
    {
        if($_SERVER["REQUEST_METHOD"] === 'GET')
        {
            $utente = CSessionManager::getUtenteLoggato();
            $agenzia = FPersistentManager::visualizzaAgenzia('AZ1');
            $immobili = FPersistentManager::getImmobiliHomepage();

            VHome::homepage($utente, $agenzia, $immobili);
        }
        // ipotetico else
    }

    public static function visitorsHomepage()
    {
        if($_SERVER["REQUEST_METHOD"] === 'GET')
        {
            $agenzia = FPersistentManager::visualizzaAgenzia('AZ1');
            $immobili = FPersistentManager::getImmobiliHomepage();

            VHome::homepage($agenzia, $immobili);
        }
        // ipotetico else
    }
}