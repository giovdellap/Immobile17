<?php

/**
 * Class CHome
 * Contiene metodi per caricare i dati necessari alla homepage del sito e alla pagina About Us e passarli alle rispettive View
 * @author Della Pelle - Di Domenica - Foderà
 * @package controller
 */
class CHome
{
    /**
     * Carica i dati dell'agenzia e i top 3 immobili dal database e li passa al SenderAdapter
     * @param bool $api
     */
    public static function homepage(bool $api)
    {
        if(VReceiver::getRequest())
        {
            $agenzia = FPersistentManager::visualizzaAgenzia('AZ1');
            $immobili = FPersistentManager::getImmobiliHomepage();

            $sender = VSenderAdapter::getInstance();
            $sender->setApi($api);
            if(CSessionManager::sessionExists())
                $sender->setUtente(CSessionManager::getUtenteLoggato());
            $sender->homepage($agenzia, $immobili);
        }
        else header('Location: '.$GLOBALS['path']);
    }

    /**
     * Carica dal database un array di immobili attivi, seleziona 3 agenti e passa i dati al SenderAdapter
     * @param bool $api
     */
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
        else header('Location: '.$GLOBALS['path']);
    }

    /*funzione che serve a testare i templates di prova (da rimuovere)*/
    public static function provatpl()
    {
        if($_SERVER["REQUEST_METHOD"] === 'GET')
            VHome::provatpl(VSmartyFactory::basicSmarty());
    }
}