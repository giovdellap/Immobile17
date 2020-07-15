<?php

/**
 * Class CAdmin
 * Implementa funzionalità per l'admin della piattaforma
 * Contiene metodi che gli permettono di operare su immobili, utenti ed appuntamenti
 * Le operazioni di ogni metodo vengono eseguite solo se l'admin è loggato
 * La chiamata ad un metodo con una richiesta HTTP diverso da quello previsto reindirizza l'utente alla homepage dell'Admin
 * @author Della Pelle - Di Domenica - Foderà
 * @package controller
 */
class CAdmin
{
    /**
     * Carica dal database i dati necessari per la homepage dell'admin e li passa all'opportuno metodo della classe View
     *
     * @throws Exception
     */
    public static function homepage()
    {
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiver::getRequest())
                {
                    $immobili = FPersistentManager::visualizzaImmobili();
                    $clienti = FPersistentManager::visualizzaUtenti('CLIENTE');
                    $agenti = FPersistentManager::visualizzaUtenti('AGENTE');
                    $inizio = MData::getToday();
                    $fine = MData::shiftedData(MData::getToday(),7);
                    $appuntamenti =FPersistentManager::loadAppWeek($inizio, $fine);
                    $smarty = VSmartyFactory::adminSmarty(CSessionManager::getUtenteLoggato());
                    VAdmin::showHomepage($smarty, $immobili, $clienti, $agenti, $appuntamenti);
                }
                else header('Location: ' . $GLOBALS['path'] . 'Admin/homepage');
            }
            else header('Location: '.$GLOBALS['path']);
        }
        else header('Location: ' . $GLOBALS['path'] . 'Utente/login');
    }

    /**
     * Richiesta HTTP GET: Chiama il metodo della View che mostra la schermata di modifica della password Admin
     * Richiesta HTTP POST: Modifica la password Admin sul database
     */
    public static function modificaPassword()
    {
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiver::getRequest())
                {
                    $smarty = VSmartyFactory::adminSmarty(CSessionManager::getUtenteLoggato());

                    VAdmin::showPasswordAdmin($smarty);
                }
                else if(VReceiver::postRequest())
                {
                    $admin = CSessionManager::getUtenteLoggato();
                    $admin->setPassword(VReceiver::getPasswordAdmin());
                    FPersistentManager::modificaAmministratore($admin);

                    header('Location: ' . $GLOBALS['path'] . 'Admin/homepage');
                }
            }
            else header('Location: '.$GLOBALS['path']);
        }
        else header('Location: ' . $GLOBALS['path'] . 'Utente/login');
    }


    // ---- IMMOBILE ----

    /**
     * Mostra all'Admin la lista degli immobili attivi
     */
    public static function immobiliAttivi()
    {
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiver::getRequest())
                {
                    $immobili = FPersistentManager::getImmobiliAttivi();
                    $smarty = VSmartyFactory::adminSmarty(CSessionManager::getUtenteLoggato());
                    VAdmin::showImmobili($smarty, $immobili);
                }
                else header('Location: ' . $GLOBALS['path'] . 'Admin/homepage');
            }
            else header('Location: '.$GLOBALS['path']);
        }
        else header('Location: ' . $GLOBALS['path'] . 'Utente/login');
    }

    /**
     * Mostra all'Admin la lista completa degli immobili
     */
    public static function visualizzaImmobili()
    {
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiver::getRequest())
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

    /**
     * Metodo per l'aggiunta di un immobile al database
     * Richiesta HTTP GET: viene visualizzata la schermata di aggiunta Immobile
     * Richiesta HTTP POST: l'immobile ottenuto viene aggiunto al Database, così come le immagini caricate
     */
    public static function aggiuntaImmobile()
    {
        if (CSessionManager::sessionExists()) {
            if (CSessionManager::adminLogged()) {
                if (VReceiver::getRequest()) {
                    $smarty = VSmartyFactory::adminSmarty(CSessionManager::getUtenteLoggato());
                    VAdmin::showAggiuntaImmobile($smarty);
                } else if (VReceiver::postRequest()) {
                    $immobile = VReceiver::immobileByPostRequest();
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
                else header('Location: '.$GLOBALS['path']);
            } else header('Location: ' . $GLOBALS['path'] . 'Utente/login');
        }
    }

    /**
     * Attiva o disattiva l'immobile a seconda che esso sia attivo o meno
     * Id immobile e attivazione/disattivazione vengono comunicati tramite parametri della richiesta HTTP POST
     */
    public static function attivazioneImmobile()
    {
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiver::postRequest())
                {
                    $immobile = FPersistentManager::visualizzaImmobile(VReceiver::generalId());
                    $attivazione = VReceiver::getAttivaorNot();
                    $immobile->setAttivo($attivazione);
                    FPersistentManager::modificaImmobile($immobile);
                }
                header('Location: '.$GLOBALS['path'].'Admin/visualizzaImmobili');
            }
            else header('Location: '.$GLOBALS['path']);
        }
        else header('Location: '.$GLOBALS['path'].'Utente/login');
    }

    /**
     * Richiesta HTTP GET: Visualizza i dettagli dell'immobile con l'ID passato come parametro
     * Richiesta HTTP POST: Modifica l'immobile con l'id passato comne parametro con i dati dell'immobile contenuti nei parametri della richiesta HTTP POST
     * @param string $id immobile da visualizzare/modificare
     */
    public static function visualizzaImmobile(string $id)
    {
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiver::getRequest())
                {
                    $smarty = VSmartyFactory::adminSmarty(CSessionManager::getUtenteLoggato());
                    $immobile = FPersistentManager::visualizzaImmobile($id);
                    VAdmin::showImmobile($smarty, $immobile);
                }
                else if(VReceiver::postRequest())
                {
                    $immobile = VReceiver::immobileByPostRequest();
                    $immobile->setId($id);
                    FPersistentManager::modificaImmobile($immobile);
                    $smarty = VSmartyFactory::adminSmarty(CSessionManager::getUtenteLoggato());
                    VAdmin::showImmobile($smarty, $immobile);
                }
            }
            else header('Location: '.$GLOBALS['path']);
        }
        else header('Location: ' . $GLOBALS['path'] . 'Utente/login');
    }

    /**
     * Elimina l'immobile con l'id passato come parametro della richiesta HTTP POST
     */
    public static function eliminaImmobile()
    {
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiver::postRequest())
                    FPersistentManager::eliminaImmobile(VReceiver::generalId());
                header('Location: '.$GLOBALS['path'].'Admin/visualizzaImmobili');
            }
            else header('Location: ' . $GLOBALS['path']);
        }
        else header('Location: ' . $GLOBALS['path'] . 'Utente/login');
    }

    /**
     * Richiesta HTTP GET: Visualizza i dettagli dell'immobile con l'ID passato come parametro
     * Richiesta HTTP POST: Modifica l'immobile con l'id passato comne parametro con i dati dell'immobile contenuti nei parametri della richiesta HTTP POST
     * @param string $id immobile da visualizzare/modificare
     */
    public static function modificaImmobile(string $id)
    {
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiver::getRequest())
                {
                    $immobile = FPersistentManager::visualizzaImmobile($id);
                    $smarty = VSmartyFactory::adminSmarty(CSessionManager::getUtenteLoggato());
                    VAdmin::showModificaImmobile($smarty, $immobile);
                }
                elseif (VReceiver::postRequest())
                {
                    $immobile = VReceiver::immobileByPostRequest();
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

    /**
     * Carica un array di clienti dal database e lo passa all'opportuno metodo della View
     */
    public static function visualizzaClienti()
    {
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiver::getRequest())
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

    /**
     * Carica un array di agenti dal database e lo passa all'opportuno metodo della View
     */
    public static function visualizzaAgenti()
    {
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiver::getRequest())
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

    /**
     * Attiva o disattiva l'utente a seconda che esso sia attivo o meno
     * Id utente e attivazione/disattivazione vengono comunicati tramite parametri della richiesta HTTP POST
     */
    public static function attivazioneUtente()
    {
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiver::postRequest())
                {
                    $utente = FPersistentManager::visualizzaUtente(VReceiver::generalId());
                    $utente->setAttivato(VReceiver::getAttivaorNot());
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

    /**
     * Elimina il cliente con l'id passato come parametro della richiesta HTTP POST
     */
    public static function eliminaCliente()
    {
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiver::postRequest())
                    FPersistentManager::eliminaUtente(FPersistentManager::visualizzaUtente(VReceiver::generalId()));
                header('Location: '.$GLOBALS['path'].'Admin/visualizzaClienti');
            }
            else header('Location: ' . $GLOBALS['path']);
        }
        else header('Location: ' . $GLOBALS['path'] . 'Utente/login');
    }

    /**
     * Richiesta HTTP GET: Visualizza i dettagli dell'utente con l'ID passato come parametro
     * Richiesta HTTP POST: Modifica l'utente con l'id passato comne parametro con i dati contenuti nei parametri della richiesta HTTP POST
     * @param string $id utente da visualizzare/modificare
     */
    public static function modificaUtente(string $id)
    {
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiver::getRequest())
                {
                    $utente = FPersistentManager::visualizzaUtente($id);
                    $smarty = VSmartyFactory::adminSmarty(CSessionManager::getUtenteLoggato());
                    VAdmin::showModificaUtente($smarty, $utente);
                }
                elseif (VReceiver::postRequest())
                {
                    if(str_split($id, 2)[0] === "CL")
                        $utente = new MCliente();
                    else $utente = new MAgenteImmobiliare();
                    $utente->setId($id);
                    VReceiver::utenteByPostRequest($utente);
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

    /**
     * Metodo per l'aggiunta di un utente al database
     * Richiesta HTTP GET: viene visualizzata la schermata di aggiunta Utente
     * Richiesta HTTP POST: l'utente ottenuto viene aggiunto al Database, così come l'immagine caricata
     */
    public static function aggiuntaUtente()
    {
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiver::getRequest())
                {
                    $smarty = VSmartyFactory::adminSmarty(CSessionManager::getUtenteLoggato());
                    VAdmin::showAggiuntaUtente($smarty);
                }
                elseif (VReceiver::postRequest())
                {
                    $newUtente=VReceiver::aggiuntaUtente();
                    FPersistentManager::registrazione($newUtente);
                    $utenteId=FPersistentManager::loadIDbyEMail($newUtente->getEmail());
                    if(VImageReceiver::imgIsUploaded())
                        FPersistentManager::addMedia(VImageReceiver::uploadImage(FPersistentManager::visualizzaUtente($utenteId)));
                    if(VReceiver::aggiuntaUtente() instanceof MCliente) {
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

    /**
     * Carica dal database i dettagli dell'agenzia e li passa al metodo opportuno della View per la visualizzazione
     */
    public static function visualizzaAgenzia()
    {
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiver::getRequest())
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

    /**
     * Elimina la sessione corrente e reindirizza l'utente alla homepage
     */
    public static function logout()
    {
        CSessionManager::sessionDestroy();
        header("Location: " . $GLOBALS['path']);
    }

    //---APPUNTAMENTO---//

    /**
     * Carica dal database tutti gli appuntamenti e li passa all'opportuno metodo della View
     */
    public static function visualizzaAppuntamenti()
    {
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiver::getRequest())
                {
                    $appuntamenti = FPersistentManager::visualizzaAppuntamenti();
                    $smarty = VSmartyFactory::adminSmarty(CSessionManager::getUtenteLoggato());
                    VAdmin::showAppuntamenti($smarty, $appuntamenti);
                }
                else header('Location: ' . $GLOBALS['path'] . 'Admin/homepage');
            }
            else header("Location: " . $GLOBALS['path']);
        }
        else header('Location: ' . $GLOBALS['path'] . 'Utente/login');
    }

    /**
     * Metodo per l'aggiunta dell'appuntamento da parte dell'Admin
     * Metodo HTTP GET: Visualizza la schermata di selezione del cliente e dell'Immobile
     * Metodo HTTP POST: Controlla se l'appuntamento ottenuto tramite i parametri della POST è accettabile.
     * In caso affermativo, lo aggiunge al database
     * @throws Exception
     */
    public static function aggiuntaAppuntamento()
    {
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiver::getRequest())
                {
                    $clienti = FPersistentManager::visualizzaUtenti('CLIENTE');
                    $immobili= FPersistentManager::visualizzaImmobili();
                    $smarty = VSmartyFactory::adminSmarty(CSessionManager::getUtenteLoggato());
                    VAdmin::aggiuntaAppParameters($smarty, $clienti, $immobili);
                }
                elseif(VReceiver::postRequest())
                {
                    $inizio = MData::getToday();
                    $fine = MData::getToday();
                    $fine->sumDays(60);
                    $cliente = FPersistentManager::visualizzaAppUtente(VReceiver::prenotaCliente());
                    $fullAgenzia = FPersistentManager::getBusyWeek(VReceiver::prenotaImmobile(), $cliente->getId(),
                        $inizio, $fine);

                    $appuntamento = new MAppuntamento();
                    $appuntamento->setCliente($cliente);
                    $appuntamento->setAgenteImmobiliare(FPersistentManager::visualizzaAppUtente(VReceiver::prenotaAgente()));
                    $appuntamento->setImmobile(FPersistentManager::visualizzaAppImmobile(VReceiver::prenotaImmobile()));
                    $appuntamento->setOrarioInizio(VReceiver::prenotaAppuntamentoInizio());
                    $appuntamento->setOrarioFine(VReceiver::prenotaAppuntamentoFine());
                    //print_r($appuntamento);
                    if ($fullAgenzia->getCalendario()->addAppuntamento($appuntamento)) {
                        FPersistentManager::addAppuntamento($appuntamento);
                        header('Location: '.$GLOBALS['path'].'Admin/visualizzaAppuntamenti');
                    }
                    else
                    {
                        $error = "Appuntamento non disponibile";
                        $immobile = FPersistentManager::visualizzaAppImmobile(VReceiver::prenotaImmobile());
                        $appLiberi = $fullAgenzia->checkDisponibilità($cliente, $immobile, $inizio, $fine);
                        $smarty = VSmartyFactory::adminSmarty(CSessionManager::adminLogged());
                        VAdmin::showCalendarioAppuntamento(VSmartyFactory::errorSmarty($smarty, $error),
                                $appLiberi, $cliente, $immobile);
                    }
                } else
                {
                    $immobile = FPersistentManager::visualizzaAppImmobile(VReceiver::prenotaImmobile());
                    VImmobile::visualizza(VSmartyFactory::basicSmarty(), $immobile);
                }
            }
            else header('Location: '.$GLOBALS['path']);
        }
        else header('Location: ' . $GLOBALS['path'] . 'Utente/login');
    }

    /**
     * Carica dal database tutte le fasce orarie libere dalla data odierna a 60 giorni dopo per la coppia cliente/immobile
     * Mostra all'Admin un calendario per la scelta
     * Il click su un qualsiasi evento del calendario chiamerà il metodo aggiuntaAppuntamento() tramite richiesta POST
     * @param array $parameters contiene id cliente e id immoible
     * @throws Exception
     */
    public static function calendarioAggiuntaAppuntamento(array $parameters)
    {
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiver::getRequest())
                {
                    $cliente = FPersistentManager::visualizzaAppUtente(VReceiver::getIdCliente($parameters));
                    $inizio = MData::getToday();
                    $fine = MData::getToday();
                    $fine->sumDays(60);
                    $immobile = FPersistentManager::visualizzaAppImmobile(VReceiver::getIdImmobile($parameters));

                    $fullAgenzia = FPersistentManager::getBusyWeek(VReceiver::getIdImmobile($parameters),
                        VReceiver::getIdCliente($parameters), $inizio, $fine);
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

    /**
     * Elimina l'appuntamento con l'id passato come parametro della richiesta HTTP POST
     */
    public static function eliminaAppuntamento()
    {
        if(CSessionManager::sessionExists())
        {
            if(CSessionManager::adminLogged())
            {
                if(VReceiver::postRequest())
                {
                    $appuntamento = FPersistentManager::visualizzaAppuntamento(VReceiver::generalId());
                    FPersistentManager::deleteAppuntamento(VReceiver::generalId());
                    CMail::modificaAppuntamentoMail($appuntamento->getCliente());
                    header('Location: '.$GLOBALS['path'].'Admin/visualizzaAppuntamenti');
                }
                else header('Location: ' . $GLOBALS['path'] . 'Admin/homepage');
            }
            else header('Location: '.$GLOBALS['path']);
        }
        else header('Location: ' . $GLOBALS['path'] . 'Utente/login');
    }


}