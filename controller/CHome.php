<?php


class CHome
{
    public static function homepage(bool $api)
    {
        if(VReceiver::getRequest())
        {
            $agenzia = FPersistentManager::visualizzaAgenzia('AZ1');
            $immobili = FPersistentManager::getImmobiliHomepage();

            $senderProxy = VSenderAdapter::getInstance();
            $senderProxy->setApi($api);
            if(CSessionManager::sessionExists())
                $senderProxy->setUtente(CSessionManager::getUtenteLoggato());
            $senderProxy->homepage($agenzia, $immobili);
        }
        // ipotetico else
    }
    public static function aboutUs(bool $api)
    {
        if(VReceiver::getRequest())
        {
            $immobili = FPersistentManager::getImmobiliAttivi();

            $agentii = FPersistentManager::visualizzaUtenti('AGENTE');
            $agenti = array_slice($agentii,0, 3);


            if(CSessionManager::sessionExists()) {
                $utente = CSessionManager::getUtenteLoggato();
                VHome::aboutUs(VSmartyFactory::userSmarty($utente),$immobili, $agenti);
            }
            else VHome::aboutUs(VSmartyFactory::basicSmarty(),$immobili, $agenti );
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