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
            $immobili = FPersistentManager::getImmobiliByParameters($parameters);
            if(CUtente::isLogged()) {
                $utente = CSessionManager::getUtenteLoggato();
                VImmobile::ricerca(VSmartyFactory::userSmarty($utente), $immobili, $parameters);
            }
            else VImmobile::ricerca(VSmartyFactory::basicSmarty(), $immobili, $parameters);
        }
    }

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
     * Funzione che consente la visualizzazione del calendario per l'Immobile
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
        if($_SERVER['REQUEST_METHOD'] == POST)
        {
            if(CUtente::isLogged())
            {
                $inizio = new MData($_POST['anno'], $_POST['mese'], $_POST['giorno'], 8);
                $fine = new MData($_POST['anno'], $_POST['mese'], $_POST['giorno'], 20);
                $fullAgenzia = FPersistentManager::getBusyWeek($_POST['idImm'], CSessionManager::getUtenteLoggato(),
                    $inizio, $fine);

                $appuntamento = new MAppuntamento();
                $appuntamento->setCliente(FPersistentManager::visualizzaAppUtente(CSessionManager::getUtenteLoggato()->getId()));
                $appuntamento->setAgenteImmobiliare(FPersistentManager::visualizzaAppUtente($_POST['idAg']));
                $appuntamento->setImmobile($_POST['idImm']);
                $inizio->setOrario($_POST['inizio']);
                $fine->setOrario($_POST['fine']);
                $appuntamento->setOrarioInizio($inizio);
                $appuntamento->setOrarioFine($fine);

                if($result = $fullAgenzia->getCalendario()->addAppuntamento($appuntamento))
                {
                    FPersistentManager::addAppuntamento($appuntamento);
                    VImmobile::confermaAppuntamento(CSessionManager::getUtenteLoggato(), $appuntamento);
                }
                //ELSE CALENDARIO CON MESSAGGIO DI ERRORE



            }
        }
    }
    {

    }
}