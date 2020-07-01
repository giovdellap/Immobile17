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
    public static function ricerca(array $parameters)
    {
        if(VReceiverProxy::getRequest())
        {
            $parameters = VReceiverProxy::ricercaParametersFiller($parameters);
            $immobili = FPersistentManager::getImmobiliByParameters($parameters);
            if(CSessionManager::sessionExists()) {
                $utente = CSessionManager::getUtenteLoggato();
                VImmobile::ricerca(VSmartyFactory::userSmarty($utente), $immobili, $parameters);
            }
            else VImmobile::ricerca(VSmartyFactory::basicSmarty(), $immobili, $parameters);
        }

    }

    /**
     * Visualizza tutti gli immobili presenti nel DB
     */
    public static function visualizzaImmobili()
    {
        if (VReceiverProxy::getRequest()) {
            $immobili = FPersistentManager::visualizzaImmobili();
            if (CSessionManager::sessionExists()) {
                $utente = CSessionManager::getUtenteLoggato();
                VImmobile::visualizzaImmobili(VSmartyFactory::userSmarty($utente), $immobili);
            } else VImmobile::visualizzaImmobili(VSmartyFactory::basicSmarty(), $immobili);
        }
    }

    /**
     * Visualizza la pagina del singolo immobile
     * @param string $id ID Immobile
     */
    public static function visualizza(string $id)
    {
        if(VReceiverProxy::getRequest())
        {
            $immobile= FPersistentManager::visualizzaImmobile($id);
            if(CSessionManager::sessionExists())
            {
                $utente=CSessionManager::getUtenteLoggato();
                VImmobile::visualizza(VSmartyFactory::userSmarty($utente),$immobile);
            }
            else VImmobile::visualizza(VSmartyFactory::basicSmarty(),$immobile);
        }
    }

    /**
     * Visualizzazione del calendario per l'Immobile
     * In caso l'utente non sia loggato carica la scheda dell'Immobile
     * DIZIONARIO PARAMETRI:
     *  - id = id immobile
     *  - ai = anno
     *  - mi = mese
     *  - gi = giorno inizio
     *  - af = anno fine
     *  - mf = mese fine
     *  - gf = giorno fine
     * @param array $parameters
     * @throws SmartyException
     */
    public static function calendario(array $parameters)
    {
        if(VReceiverProxy::getRequest() && key_exists('id', $parameters))
        {
            if(CSessionManager::sessionExists())
            {
                $parameters = VReceiverProxy::calendarioParametersFiller($parameters);
                $inizio = VReceiverProxy::calendarioInizio($parameters);
                $fine = VReceiverProxy::calendarioFine($parameters);
                $immobile = FPersistentManager::visualizzaImmobile($parameters["id"]);
                $fullAgenzia = FPersistentManager::getBusyWeek($parameters["id"], CSessionManager::getUtenteLoggato()->getId(),
                $inizio, $fine);
                $appLiberi = $fullAgenzia->checkDisponibilità(CSessionManager::getUtenteLoggato(), $immobile, $inizio, $fine);
                $utente = CSessionManager::getUtenteLoggato();
                VImmobile::calendario(VSmartyFactory::userSmarty($utente), $appLiberi, $inizio, $fine, $immobile);
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
    public static function prenota()
    {
        if (VReceiverProxy::postRequest()) {
            if (CSessionManager::sessionExists()) {
                $inizio = VReceiverProxy::prenotaInizioAgenzia();
                $fine = VReceiverProxy::prenotaFineAgenzia();
                $utente = CSessionManager::getUtenteLoggato();
                $fullAgenzia = FPersistentManager::getBusyWeek($_POST['idImm'], $utente->getId(),
                    $inizio, $fine);

                $appuntamento = new MAppuntamento();
                $appuntamento->setCliente(FPersistentManager::visualizzaAppUtente(CSessionManager::getUtenteLoggato()->getId()));
                $appuntamento->setAgenteImmobiliare(FPersistentManager::visualizzaAppUtente(VReceiverProxy::prenotaAgente()));
                $appuntamento->setImmobile(VReceiverProxy::prenotaImmobile());
                $appuntamento->setOrarioInizio(VReceiverProxy::prenotaAppuntamentoInizio());
                $appuntamento->setOrarioFine(VReceiverProxy::prenotaAppuntamentoFine());

                if ($fullAgenzia->getCalendario()->addAppuntamento($appuntamento)) {
                    FPersistentManager::addAppuntamento($appuntamento);
                    VImmobile::confermaAppuntamento($utente, $appuntamento);
                }
                else
                {
                    $error = "Appuntamento non disponibile";
                    $immobile = FPersistentManager::visualizzaImmobile(VReceiverProxy::prenotaImmobile());
                    $appLiberi = $fullAgenzia->checkDisponibilità($utente, $immobile, $inizio, $fine);
                    $smarty = VSmartyFactory::userSmarty($utente);
                    VImmobile::calendario(VSmartyFactory::errorSmarty($smarty, $error), $appLiberi, $inizio, $fine, $immobile);
                }
            } else
            {
                $immobile = FPersistentManager::visualizzaImmobile(VReceiverProxy::prenotaImmobile());
                VImmobile::visualizza(VSmartyFactory::basicSmarty(), $immobile);
            }
        } else CHome::homepage();
    }


}