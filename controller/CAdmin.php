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

    // ---- IMMOBILE ----

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

    public static function aggiuntaImmobile()
    {
        if (CSessionManager::sessionExists()) {
            if (CSessionManager::adminLogged()) {
                if (VReceiverProxy::getRequest()) {
                    $smarty = VSmartyFactory::adminSmarty(CSessionManager::getUtenteLoggato());
                    VAdmin::showAggiuntaImmobile($smarty);
                } else if (VReceiverProxy::postRequest()) {
                    $immobile = VReceiverProxy::immobileByPostRequest();
                    $db_result = FPersistentManager::addImmobile($immobile);

                    if ($db_result === "OK") {
                        $immobile=FPersistentManager::getByKeyword($immobile->getNome())[0];
                        $immagini=VImageReceiver::uploadMultipleImages($immobile);
                        foreach ($immagini as $immagine)
                            FPersistentManager::addMedia($immagine);
                        $smarty=VSmartyFactory::adminSmarty(CSessionManager::getUtenteLoggato());
                        VAdmin::showAggiuntaImmobile($smarty);
                        //header('Location: '.$GLOBALS['path'].'Admin/visualizzaImmobili');
                    }


                }

                //ERRORE DA VEDERE
            } else header('Location: ' . $GLOBALS['path'] . 'Utente/login');
        }
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

    public static function modificaImmobile(string $id)
    {
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiverProxy::getRequest())
                {
                    $immobile = FPersistentManager::visualizzaImmobile($id);
                    $smarty = VSmartyFactory::adminSmarty(CSessionManager::getUtenteLoggato());
                    VAdmin::showModificaImmobile($smarty, $immobile);
                }
                elseif (VReceiverProxy::postRequest())
                {
                    $immobile = VReceiverProxy::immobileByPostRequest();
                    $immobile->setId($id);
                    FPersistentManager::modificaImmobile($immobile);
                    $smarty = VSmartyFactory::adminSmarty(CSessionManager::getUtenteLoggato());
                    VAdmin::showModificaImmobile($smarty, $immobile);
                }
                else header('Location: ' . $GLOBALS['path']);
            }
            else header('Location: ' . $GLOBALS['path']);
        }
        else header('Location: ' . $GLOBALS['path'] . 'Utente/login');
    }

    // ---- UTENTE ----

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
                        header('Location: '.$GLOBALS['path'].'Admin/visualizzaClienti');
                    elseif($utente instanceof MAgenteImmobiliare) header('Location: '.$GLOBALS['path'].'Admin/visualizzaAgenti');
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
                    FPersistentManager::eliminaUtente(FPersistentManager::visualizzaUtente(VReceiverProxy::generalId()));
                header('Location: '.$GLOBALS['path'].'Admin/visualizzaClienti');
            }
            else header('Location: ' . $GLOBALS['path']);
        }
        else header('Location: ' . $GLOBALS['path'] . 'Utente/login');
    }

    public static function modificaUtente(string $id)
    {
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiverProxy::getRequest())
                {
                    $utente = FPersistentManager::visualizzaUtente($id);
                    $smarty = VSmartyFactory::adminSmarty(CSessionManager::getUtenteLoggato());
                    VAdmin::showModificaUtente($smarty, $utente);
                }
                elseif (VReceiverProxy::postRequest())
                {
                    if(str_split($id, 2)[0] === "CL")
                        $utente = new MCliente();
                    else $utente = new MAgenteImmobiliare();
                    $utente->setId($id);
                    VReceiverProxy::utenteByPostRequest($utente);
                    FPersistentManager::modificaUtente($utente);
                    $smarty = VSmartyFactory::adminSmarty(CSessionManager::getUtenteLoggato());
                    VAdmin::showModificaUtente($smarty, $utente);
                }
                else header('Location: ' . $GLOBALS['path']);
            }
            else header('Location: ' . $GLOBALS['path']);
        }
        else header('Location: ' . $GLOBALS['path'] . 'Utente/login');
    }

    public static function aggiuntaUtente()
    {
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiverProxy::getRequest())
                {
                    $smarty = VSmartyFactory::adminSmarty(CSessionManager::getUtenteLoggato());
                    VAdmin::showAggiuntaUtente($smarty);
                }
                elseif (VReceiverProxy::postRequest())
                {
                    $newUtente=VReceiverProxy::aggiuntaUtente();
                    FPersistentManager::registrazione($newUtente);
                    $utenteId=FPersistentManager::loadIDbyEMail($newUtente->getEmail());
                    FPersistentManager::addMedia(VImageReceiver::uploadImage(FPersistentManager::visualizzaUtente($utenteId)));
                    if(VReceiverProxy::aggiuntaUtente() instanceof MCliente) {

                        header('Location: ' . $GLOBALS['path'] . 'Admin/visualizzaClienti');
                    }
                    else
                        header('Location: '.$GLOBALS['path'].'Admin/visualizzaAgenti');

                }
                else header('Location: ' . $GLOBALS['path']);
            }
            else header('Location: ' . $GLOBALS['path']);
        }
        else header('Location: ' . $GLOBALS['path'] . 'Utente/login');
    }


    public static function visualizzaAgenzia()
    {
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiverProxy::getRequest())
                {
                    $agenzia = FPersistentManager::visualizzaAgenzia("AZ1");
                    $smarty = VSmartyFactory::adminSmarty(CSessionManager::getUtenteLoggato());
                    VAdmin::showAgenzia($smarty, $agenzia);
                }
                else header('Location: ' . $GLOBALS['path'] . 'Admin/homepage');
            }
            else header('Location: ' . $GLOBALS['path']);
        }
        else header('Location: ' . $GLOBALS['path'] . 'Utente/login');
    }


    public static function logout()
    {
        CSessionManager::sessionDestroy();
        header("Location: " . $GLOBALS['path']);
    }

    //---APPUNTAMENTO---//
    public static function visualizzaAppuntamenti()
    {
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiverProxy::getRequest())
                {
                    $appuntamenti = FPersistentManager::visualizzaAppuntamenti();
                    $smarty = VSmartyFactory::adminSmarty(CSessionManager::getUtenteLoggato());
                    VAdmin::showAppuntamenti($smarty, $appuntamenti);
                }
                else header('Location: ' . $GLOBALS['path'] . 'Admin/homepage');
            }
            //ERRORE DA VEDERE
        }
        else header('Location: ' . $GLOBALS['path'] . 'Utente/login');
    }

    public static function aggiuntaAppuntamento()
    {
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiverProxy::getRequest())
                {
                    $clienti = FPersistentManager::visualizzaUtenti('CLIENTE');
                    $immobili= FPersistentManager::visualizzaImmobili();
                    $smarty = VSmartyFactory::adminSmarty(CSessionManager::getUtenteLoggato());
                    VAdmin::aggiuntaAppParameters($smarty, $clienti, $immobili);
                }
                elseif(VReceiverProxy::postRequest())
                {
                    $inizio = MData::getToday();
                    $fine = MData::getToday();
                    $fine->sumDays(60);
                    $cliente = FPersistentManager::visualizzaAppUtente(VReceiverProxy::prenotaCliente());
                    $fullAgenzia = FPersistentManager::getBusyWeek(VReceiverProxy::prenotaImmobile(), $cliente->getId(),
                        $inizio, $fine);

                    $appuntamento = new MAppuntamento();
                    $appuntamento->setCliente($cliente);
                    $appuntamento->setAgenteImmobiliare(FPersistentManager::visualizzaAppUtente(VReceiverProxy::prenotaAgente()));
                    $appuntamento->setImmobile(FPersistentManager::visualizzaImmobile(VReceiverProxy::prenotaImmobile()));
                    $appuntamento->setOrarioInizio(VReceiverProxy::prenotaAppuntamentoInizio());
                    $appuntamento->setOrarioFine(VReceiverProxy::prenotaAppuntamentoFine());
                    //print_r($appuntamento);
                    if ($fullAgenzia->getCalendario()->addAppuntamento($appuntamento)) {
                        FPersistentManager::addAppuntamento($appuntamento);
                        header('Location: '.$GLOBALS['path'].'Admin/visualizzaAppuntamenti');
                    }
                    else
                    {
                        $error = "Appuntamento non disponibile";
                        $immobile = FPersistentManager::visualizzaImmobile(VReceiverProxy::prenotaImmobile());
                        $appLiberi = $fullAgenzia->checkDisponibilità($cliente, $immobile, $inizio, $fine);
                        $smarty = VSmartyFactory::adminSmarty(CSessionManager::adminLogged());
                        VAdmin::showCalendarioAppuntamento(VSmartyFactory::errorSmarty($smarty, $error),
                                $appLiberi, $cliente, $immobile);
                    }
                } else
                {
                    $immobile = FPersistentManager::visualizzaImmobile(VReceiverProxy::prenotaImmobile());
                    VImmobile::visualizza(VSmartyFactory::basicSmarty(), $immobile);
                }
            }
            else header('Location: '.$GLOBALS['path']);
        }
        else header('Location: ' . $GLOBALS['path'] . 'Utente/login');
    }

    public static function calendarioAggiuntaAppuntamento(array $parameters)
    {
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiverProxy::getRequest())
                {
                    $cliente = FPersistentManager::visualizzaAppUtente(VReceiverProxy::getIdCliente($parameters));
                    $inizio = MData::getToday();
                    $fine = MData::getToday();
                    $fine->sumDays(60);
                    $immobile = FPersistentManager::visualizzaImmobile(VReceiverProxy::getIdImmobile($parameters));

                    $fullAgenzia = FPersistentManager::getBusyWeek(VReceiverProxy::getIdImmobile($parameters),
                        VReceiverProxy::getIdCliente($parameters), $inizio, $fine);
                    $appLiberi = $fullAgenzia->checkDisponibilità($cliente, $immobile, $inizio, $fine);

                    $smarty = VSmartyFactory::adminSmarty(CSessionManager::getUtenteLoggato());
                    VAdmin::showCalendarioAppuntamento($smarty, $appLiberi, $cliente, $immobile);
                }
                else header('Location: ' . $GLOBALS['path'] . 'Admin/homepage');
            }
            else header('Location: '.$GLOBALS['path']);
        }
        else header('Location: ' . $GLOBALS['path'] . 'Utente/login');
    }

}