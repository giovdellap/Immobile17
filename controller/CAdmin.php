<?php


class CAdmin
{
    public static function homepage()
    {
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiverProxy::getRequest())
                {
                    $immobili = FPersistentManager::visualizzaImmobili();
                    $clienti = FPersistentManager::visualizzaUtenti('CLIENTE');
                    $agenti = FPersistentManager::visualizzaUtenti('AGENTE');
                    $smarty = VSmartyFactory::adminSmarty(CSessionManager::getUtenteLoggato());
                    VAdmin::showHomepage($smarty, $immobili, $clienti, $agenti);
                }
                else header('Location: ' . $GLOBALS['path'] . 'Admin/homepage');
            }
            //ERRORE DA VEDERE
        }
        else header('Location: ' . $GLOBALS['path'] . 'Utente/login');
    }

    public static function immobiliAttivi()
    {
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiverProxy::getRequest())
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

    public static function visualizzaImmobili()
    {
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiverProxy::getRequest())
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
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiverProxy::getRequest())
                {
                    $smarty = VSmartyFactory::adminSmarty(CSessionManager::getUtenteLoggato());
                    VAdmin::showAggiuntaImmobile($smarty);
                }
                else if(VReceiverProxy::postRequest())
                {
                    $immobile = self::getImmobilebyPostRequest();
                    FPersistentManager::addImmobile($immobile);

                }
            }
            //ERRORE DA VEDERE
        }
        else header('Location: ' . $GLOBALS['path'] . 'Utente/login');
    }

    public static function attivazioneImmobile()
    {
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiverProxy::postRequest())
                {
                    $immobile = FPersistentManager::visualizzaImmobile(VReceiverProxy::generalId());
                    $attivazione = VReceiverProxy::getAttivaorNot();
                    $immobile->setAttivo($attivazione);
                    FPersistentManager::modificaImmobile($immobile);
                }
                header('Location: '.$GLOBALS['path'].'Admin/visualizzaImmobili');
            }
            else header('Location: '.$GLOBALS['path']);
        }
        else header('Location: '.$GLOBALS['path'].'Utente/login');
    }



    public static function visualizzaImmobile(string $id)
    {
        if(CUtente::isLogged())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiverProxy::getRequest())
                {
                    $smarty = VSmartyFactory::adminSmarty(CSessionManager::getUtenteLoggato());
                    $immobile = FPersistentManager::visualizzaImmobile($id);
                    VAdmin::showImmobile($smarty, $immobile);
                }
                else if(VReceiverProxy::postRequest())
                {
                    $immobile = VReceiverProxy::immobileByPostRequest();
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

    public static function eliminaImmobile()
    {
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiverProxy::postRequest())
                    FPersistentManager::eliminaImmobile(VReceiverProxy::generalId());
                header('Location: '.$GLOBALS['path'].'Admin/visualizzaImmobili');
            }
            else header('Location: ' . $GLOBALS['path']);
        }
        else header('Location: ' . $GLOBALS['path'] . 'Utente/login');
    }

    public static function visualizzaClienti()
    {
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiverProxy::getRequest())
                {
                    $clienti = FPersistentManager::visualizzaUtenti("CLIENTE");
                    $smarty = VSmartyFactory::adminSmarty(CSessionManager::getUtenteLoggato());
                    VAdmin::showClienti($smarty, $clienti);
                }
                else header('Location: ' . $GLOBALS['path'] . 'Admin/homepage');
            }
            //ERRORE DA VEDERE
        }
        else header('Location: ' . $GLOBALS['path'] . 'Utente/login');
    }

    public static function visualizzaAgenti()
    {
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiverProxy::getRequest())
                {
                    $agenti = FPersistentManager::visualizzaUtenti("AGENTE");
                    $smarty = VSmartyFactory::adminSmarty(CSessionManager::getUtenteLoggato());
                    VAdmin::showAgenti($smarty, $agenti);
                }
                else header('Location: ' . $GLOBALS['path'] . 'Admin/homepage');
            }
            //ERRORE DA VEDERE
        }
        else header('Location: ' . $GLOBALS['path'] . 'Utente/login');
    }

    public static function attivazioneUtente()
    {
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiverProxy::postRequest())
                {
                    $utente = FPersistentManager::visualizzaUtente(VReceiverProxy::generalId());
                    $utente->setAttivato(VReceiverProxy::getAttivaorNot());
                    FPersistentManager::modificaUtente($utente);
                    if($utente instanceof MCliente)
                        header('Location: '.$GLOBALS['path'].'Admin/visualizaClienti');
                    else header('Location: '.$GLOBALS['path'].'Admin/visualizaClienti');
                }
                else header('Location: '.$GLOBALS['path'].'Admin/homepage');
            }
            else header('Location: ' . $GLOBALS['path']);
        }
        else header('Location: ' . $GLOBALS['path'] . 'Utente/login');
    }

    public static function eliminaCliente()
    {
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiverProxy::postRequest())
                    FPersistentManager::eliminaUtente(VReceiverProxy::generalId());
                header('Location: '.$GLOBALS['path'].'Admin/visualizaClienti');
            }
            else header('Location: ' . $GLOBALS['path']);
        }
        else header('Location: ' . $GLOBALS['path'] . 'Utente/login');
    }


}