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
        if($_SERVER["REQUEST_METHOD"] === 'GET')
        {
            if(!key_exists('pmin', $parameters))
                $parameters['pmin'] = 100;
            if(!key_exists('pmax', $parameters))
                $parameters['pmax'] = 1000000;
            if(!key_exists('gmin', $parameters))
                $parameters['gmin'] = 0;
            if(!key_exists('gmax', $parameters))
                $parameters['gmax'] = 2000;
            $immobili = FPersistentManager::getImmobiliByParameters($parameters);
            if(CUtente::isLogged()) {
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
        if ($_SERVER["REQUEST_METHOD"] == 'GET') {
            $immobili = FPersistentManager::visualizzaImmobili();
            if (CUtente::isLogged()) {
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
        if($_SERVER["REQUEST_METHOD"]=='GET')
        {
            $immobile= FPersistentManager::visualizzaImmobile($id);
            if(CUtente::isLogged())
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
     *  - a = anno
     *  - m = mese
     *  - i = giorno inizio
     *  - f = giorno fine
     * @param array $parameters
     */
    public static function calendario(array $parameters)
    {
        if($_SERVER['REQUEST_METHOD'] == GET)
        {
            if(CUtente::isLogged())
            {
                $inizio = new MData($parameters["a"], $parameters["m"], $parameters["i"], 8);
                $fine = new MData($parameters["a"], $parameters["m"], $parameters["f"], 20);
                $immobile = FPersistentManager::visualizzaImmobile($parameters["id"]);
                $fullAgenzia = FPersistentManager::getBusyWeek($parameters["id"], CSessionManager::getUtenteLoggato(),
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
     */
    public static function prenota()
    {
        if ($_SERVER['REQUEST_METHOD'] == POST) {
            if (CUtente::isLogged()) {
                $inizio = new MData($_POST['anno'], $_POST['mese'], $_POST['giorno'], 8);
                $fine = new MData($_POST['anno'], $_POST['mese'], $_POST['giorno'], 20);
                $utente = CSessionManager::getUtenteLoggato();
                $fullAgenzia = FPersistentManager::getBusyWeek($_POST['idImm'], $utente->getId(),
                    $inizio, $fine);

                $appuntamento = new MAppuntamento();
                $appuntamento->setCliente(FPersistentManager::visualizzaAppUtente(CSessionManager::getUtenteLoggato()->getId()));
                $appuntamento->setAgenteImmobiliare(FPersistentManager::visualizzaAppUtente($_POST['idAg']));
                $appuntamento->setImmobile($_POST['idImm']);
                $inizio->setOrario($_POST['inizio']);
                $fine->setOrario($_POST['fine']);
                $appuntamento->setOrarioInizio($inizio);
                $appuntamento->setOrarioFine($fine);

                if ($fullAgenzia->getCalendario()->addAppuntamento($appuntamento)) {
                    FPersistentManager::addAppuntamento($appuntamento);
                    VImmobile::confermaAppuntamento($utente, $appuntamento);
                }
                else
                {
                    $error = "Appuntamento non disponibile";
                    $immobile = FPersistentManager::visualizzaImmobile($_POST['idImm']);
                    $appLiberi = $fullAgenzia->checkDisponibilità($utente, $immobile, $inizio, $fine);
                    $smarty = VSmartyFactory::userSmarty($utente);
                    VImmobile::calendario(VSmartyFactory::errorSmarty($smarty, $error), $appLiberi, $inizio, $fine, $immobile);
                }
            } else VImmobile::visualizza(VSmartyFactory::basicSmarty(), $_POST['idImm']);
        } else CHome::homepage();
    }
}