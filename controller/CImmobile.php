<?php


class CImmobile
{
    public static function vendita()
    {
        if($_SERVER["REQUEST_METHOD"] === 'GET')
        {
            $immobili = FPersistentManager::getTipologia("Vendita");
            if (CUtente::isLogged())
                VImmobile::vistaUtente($immobili,FPersistentManager::visualizzaUtente(CSessionManager::getUtenteLoggato()),"Vendita");
            else VImmobile::vistaVisitor($immobili,"Vendita");
        }
    }

    public static function affitto()
    {
        if ($_SERVER["REQUEST_METHOD"] === 'GET') {
            $immobili = FPersistentManager::getTipologia("Affitto");
            if (CUtente::isLogged())
                VImmobile::vistaUtente($immobili, FPersistentManager::visualizzaUtente(CSessionManager::getUtenteLoggato()),"Affitto");
            else VImmobile::vistaVisitor($immobili,"Affitto");
        }
    }
}