<?php

/**
 * Class CImmobile
 * Cntiene metodi per le operazioni sugli immobili che riguardano l'utente(ricerca, visualizzazione e prenotazione di appuntamenti)
 * @author Della Pelle - Di Domenica - Foderà
 * @package controller
 */
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
     * @param bool $api
     */
    public static function ricerca(array $parameters, bool $api)
    {
        if(VReceiver::getRequest())
        {
            $parameters = VReceiver::ricercaParametersFiller($parameters);
            $immobili = FPersistentManager::getImmobiliByParameters($parameters);
            $sender = VSenderAdapter::getInstance();
            $sender->setApi($api);
            if(CSessionManager::sessionExists())
                $sender->setUtente(CSessionManager::getUtenteLoggato());
            $sender->ricerca($immobili, $parameters);
        }
        else header('Location: '.$GLOBALS['path'].'Immobile/visualizzaImmobili');

    }

    /**
     * Visualizza tutti gli immobili presenti nel DB
     * @param bool $api
     */
    public static function visualizzaImmobili(bool $api)
    {
        if (VReceiver::getRequest()) {
            $immobili = FPersistentManager::visualizzaImmobili();
            $sender = VSenderAdapter::getInstance();
            $sender->setApi($api);
            if (CSessionManager::sessionExists())
                $sender->setUtente(CSessionManager::getUtenteLoggato());
            $sender->visualizzaImmobili($immobili);
        }
    }

    /**
     * Visualizza la pagina del singolo immobile
     * @param string $id ID Immobile
     * @param bool $api
     */
    public static function visualizza(string $id, bool $api)
    {
        if(VReceiver::getRequest())
        {
            $immobile= FPersistentManager::visualizzaImmobile($id);
            $sender = VSenderAdapter::getInstance();
            $sender->setApi($api);
            if(CSessionManager::sessionExists())
                $sender->setUtente(CSessionManager::getUtenteLoggato());
            $sender->visualizzaImmobile($immobile);
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
     * @param bool $api
     */
    public static function calendario(array $parameters, bool $api)
    {
        if(VReceiver::getRequest() && key_exists('id', $parameters))
        {
            if(CSessionManager::sessionExists())
            {
                $parameters = VReceiver::calendarioParametersFiller($parameters);
                $inizio = VReceiver::calendarioInizio($parameters);
                $fine = VReceiver::calendarioFine($parameters);
                $fine->nextDay();
                $immobile = FPersistentManager::visualizzaAppImmobile($parameters["id"]);
                $fullAgenzia = FPersistentManager::getBusyWeek($parameters["id"],
                    CSessionManager::getUtenteLoggato()->getId(), $inizio, $fine);
                $utenteApp = FPersistentManager::visualizzaAppUtente(CSessionManager::getUtenteLoggato()->getId());
                $appLiberi = $fullAgenzia->checkDisponibilità($utenteApp, $immobile, $inizio, $fine);
                $sender = VSenderAdapter::getInstance();
                $sender->setApi($api);
                $sender->setUtente(CSessionManager::getUtenteLoggato());
                $sender->immobileCalendario($appLiberi, $inizio, $fine, $immobile);
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
     * @param bool $api
     */
    public static function prenota(bool $api)
    {
        if (VReceiver::postRequest()) {

            if (CSessionManager::sessionExists()) {
                $inizio = VReceiver::prenotaInizioAgenzia();
                $fine = VReceiver::prenotaFineAgenzia();
                $utente = CSessionManager::getUtenteLoggato();
                $fullAgenzia = FPersistentManager::getBusyWeek(VReceiver::prenotaImmobile(), $utente->getId(),
                    $inizio, $fine);

                $appuntamento = new MAppuntamento();
                $appuntamento->setCliente(FPersistentManager::visualizzaAppUtente(CSessionManager::getUtenteLoggato()->getId()));
                $appuntamento->setAgenteImmobiliare(FPersistentManager::visualizzaAppUtente(VReceiver::prenotaAgente()));
                $appuntamento->setImmobile(FPersistentManager::visualizzaAppImmobile(VReceiver::prenotaImmobile()));
                $appuntamento->setOrarioInizio(VReceiver::prenotaAppuntamentoInizio());
                $appuntamento->setOrarioFine(VReceiver::prenotaAppuntamentoFine());
                //print_r($appuntamento);
                if ($fullAgenzia->getCalendario()->addAppuntamento($appuntamento)) {
                    FPersistentManager::addAppuntamento($appuntamento);
                    header('Location: '.$GLOBALS['path'].'Utente/calendario');

                }
                else
                {
                    $error = "Appuntamento non disponibile";
                    $immobile = FPersistentManager::visualizzaAppImmobile(VReceiver::prenotaImmobile());
                    $appLiberi = $fullAgenzia->checkDisponibilità($utente, $immobile, $inizio, $fine);

                    $sender = VSenderAdapter::getInstance();
                    $sender->setApi($api);
                    $sender->setUtente($utente);
                    $sender->setError($error);
                    $sender->immobileCalendario($appLiberi, $inizio, $fine, $immobile);
                }
            } else
            {
                $immobile = FPersistentManager::visualizzaAppImmobile(VReceiver::prenotaImmobile());
                $sender = VSenderAdapter::getInstance();
                $sender->setApi($api);
                $sender->visualizzaImmobile($immobile);
            }
        } else header('Location: '.$GLOBALS['path']);
    }


}