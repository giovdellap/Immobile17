<?php


class CHome
{
    public static function homepage(bool $api)
    {
        if(VReceiverProxy::getRequest())
        {
            $agenzia = FPersistentManager::visualizzaAgenzia('AZ1');
            $immobili = FPersistentManager::getImmobiliHomepage();

            $senderProxy = VSenderProxy::getInstance();
            $senderProxy->setApi($api);
            if(CSessionManager::sessionExists())
                $senderProxy->setUtente(CSessionManager::getUtenteLoggato());
            $senderProxy->homepage($agenzia, $immobili);
        }
        // ipotetico else
    }
    public static function aboutUs(bool $api)
    {
        if(VReceiverProxy::getRequest())
        {
            $immobili = FPersistentManager::getImmobiliHomepage();
            if(CSessionManager::sessionExists()) {
                $utente = CSessionManager::getUtenteLoggato();
                VHome::aboutUs(VSmartyFactory::userSmarty($utente),$immobili);
            }
            else VHome::aboutUs(VSmartyFactory::basicSmarty(),$immobili);
        }
        // ipotetico else
    }
    /*funzione che serve a testare i templates di prova (da rimuovere)*/
    public static function provatpl()
    {
        if($_SERVER["REQUEST_METHOD"] === 'GET')
            VHome::provatpl(VSmartyFactory::basicSmarty());
    }
}