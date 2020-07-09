<?php


class CImmobile
{


    /**
     * Visualizza la pagina degli immobili prendendo dal DB solo quelli che matchano i parametri della query
     * Dizionario chiavi:
     *  ti = Affitto/Vendita
     *  pc = Parola Chiave
     *  tp = Tipologia
     *  gmin = Grandezza Minima
     *  gmax = Grandezza Massima
     *  pmin = Prezzo Minimo
     *  pmax = Prezzo Massimo
     * @param array $parameters
     */
    public static function ricerca(array $parameters, bool $api)
    {
        if(VReceiverProxy::getRequest())
        {
            $parameters = VReceiverProxy::ricercaParametersFiller($parameters);
            $immobili = FPersistentManager::getImmobiliByParameters($parameters);
            $senderProxy = VSenderProxy::getInstance();
            $senderProxy->setApi($api);
            if(CSessionManager::sessionExists())
                $senderProxy->setUtente(CSessionManager::getUtenteLoggato());
            $senderProxy->ricerca($immobili, $parameters);
        }
        else header('Location: '.$GLOBALS['path'].'Immobile/visualizzaImmobili');

    }

    /**
     * Visualizza tutti gli immobili presenti nel DB
     */
    public static function visualizzaImmobili(bool $api)
    {
        if (VReceiverProxy::getRequest()) {
            $immobili = FPersistentManager::visualizzaImmobili();
            $senderProxy = VSenderProxy::getInstance();
            $senderProxy->setApi($api);
            if (CSessionManager::sessionExists())
                $senderProxy->setUtente(CSessionManager::getUtenteLoggato());
            $senderProxy->visualizzaImmobili($immobili);
        }
    }

    /**
     * Visualizza la pagina del singolo immobile
     * @param string $id ID Immobile
     */
    public static function visualizza(string $id, bool $api)
    {
        if(VReceiverProxy::getRequest())
        {
            $immobile= FPersistentManager::visualizzaImmobile($id);
            $senderProxy = VSenderProxy::getInstance();
            $senderProxy->setApi($api);
            if(CSessionManager::sessionExists())
                $senderProxy->setUtente(CSessionManager::getUtenteLoggato());
            $senderProxy->visualizzaImmobile($immobile);
        }
    }

    /**
     * Visualizzazione del calendario per l'Immobile
     * In caso l'utente non sia loggato carica la scheda dell'Immobile
     * DIZIONARIO PARAMETRI:
     *  - id = id immobile
     *  - inizio = data inizio
     *  - fine = data fine
     *  - le date sono in formato yyyy-mm--dd
     * @param array $parameters
     * @throws SmartyException
     */
    public static function calendario(array $parameters, bool $api)
    {
        if(VReceiverProxy::getRequest() && key_exists('id', $parameters))
        {
            if(CSessionManager::sessionExists())
            {
                $parameters = VReceiverProxy::calendarioParametersFiller($parameters);
                $inizio = VReceiverProxy::calendarioInizio($parameters);
                $fine = VReceiverProxy::calendarioFine($parameters);
                $fine->nextDay();
                $immobile = FPersistentManager::visualizzaImmobile($parameters["id"]);
                $fullAgenzia = FPersistentManager::getBusyWeek($parameters["id"],
                    CSessionManager::getUtenteLoggato()->getId(), $inizio, $fine);
                $utenteApp = FPersistentManager::visualizzaAppUtente(CSessionManager::getUtenteLoggato()->getId());
                $appLiberi = $fullAgenzia->checkDisponibilità($utenteApp, $immobile, $inizio, $fine);
                $senderProxy = VSenderProxy::getInstance();
                $senderProxy->setApi($api);
                $senderProxy->setUtente(CSessionManager::getUtenteLoggato());
                $senderProxy->immobileCalendario($appLiberi, $inizio, $fine, $immobile);
            }
            else CImmobile::visualizza($parameters["id"]);
        }
    }

    /**
     * Funzione per la prenotazione dell'appuntamento
     * Controlla che l'appuntamento possa essere aggiunto al calendario
     * In caso positivo lo aggiunge, in caso negativo mostra all'utente il calendario con un messaggio di errore
     * Dizionario POST:
     *  - anno = anno appuntamento
     *  - mese = mese appuntamento
     *  - giorno = giorno appuntamento
     *  - inizio = inizio appuntamento
     *  - fine = fine appuntamento
     *  - idImm = ID Immobile
     *  - idAg = ID Agente Immobiliare
     * @throws SmartyException
     */
    public static function prenota(bool $api)
    {
        if (VReceiverProxy::postRequest()) {

            if (CSessionManager::sessionExists()) {
                $inizio = VReceiverProxy::prenotaInizioAgenzia();
                $fine = VReceiverProxy::prenotaFineAgenzia();
                $utente = CSessionManager::getUtenteLoggato();
                $fullAgenzia = FPersistentManager::getBusyWeek(VReceiverProxy::prenotaImmobile(), $utente->getId(),
                    $inizio, $fine);

                $appuntamento = new MAppuntamento();
                $appuntamento->setCliente(FPersistentManager::visualizzaAppUtente(CSessionManager::getUtenteLoggato()->getId()));
                $appuntamento->setAgenteImmobiliare(FPersistentManager::visualizzaAppUtente(VReceiverProxy::prenotaAgente()));
                $appuntamento->setImmobile(FPersistentManager::visualizzaImmobile(VReceiverProxy::prenotaImmobile()));
                $appuntamento->setOrarioInizio(VReceiverProxy::prenotaAppuntamentoInizio());
                $appuntamento->setOrarioFine(VReceiverProxy::prenotaAppuntamentoFine());
                //print_r($appuntamento);
                if ($fullAgenzia->getCalendario()->addAppuntamento($appuntamento)) {
                    FPersistentManager::addAppuntamento($appuntamento);
                    header('Location: '.$GLOBALS['path'].'Utente/calendario');

                }
                else
                {
                    $error = "Appuntamento non disponibile";
                    $immobile = FPersistentManager::visualizzaImmobile(VReceiverProxy::prenotaImmobile());
                    $appLiberi = $fullAgenzia->checkDisponibilità($utente, $immobile, $inizio, $fine);

                    $senderProxy = VSenderProxy::getInstance();
                    $senderProxy->setApi($api);
                    $senderProxy->setUtente($utente);
                    $senderProxy->setError($error);
                    $senderProxy->immobileCalendario($appLiberi, $inizio, $fine, $immobile);
                }
            } else
            {
                $immobile = FPersistentManager::visualizzaImmobile(VReceiverProxy::prenotaImmobile());
                $senderProxy = VSenderProxy::getInstance();
                $senderProxy->setApi($api);
                $senderProxy->visualizzaImmobile($immobile);
            }
        } else header('Location: '.$GLOBALS['path']);
    }


}