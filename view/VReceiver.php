<?php

/**
 * Class VReceiver
 * Fornisce metodi per il completamento di query incomplete e per ottenere dal server informazioni sul tipo di richiesta HTTP e sui parametri della stessa
 * @author Della Pelle - Di Domenica - Foderà
 * @package view
 */
class VReceiver
{

    // ---- GENERAL METHODS ----

    /**
     * @return bool richiesta HTTP GET
     */
    public static function getRequest():bool
    {
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }

    /**
     * @return bool richiesta HTTP POST
     */
    public static function postRequest(): bool
    {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    // ---- UTENTE ----

    /**
     * Ritorna un Mutente con gli attributi email e password ottenuti dalla richiesta HTTP POST
     * @return MUtente
     */
    public static function loginUser()
    {
        $utente = new MUtente();
        $utente->setEmail($_POST['email']);
        $utente->setPassword($_POST['password']);
        return $utente;
    }

    /**
     * @return bool eistsenza del parametro POST 'remember'
     */
    public static function rememberMe():bool
    {
        if(!empty($_POST['remember']))
            return true;
        else return false;
    }

    /**
     * Ritorna un MCliente con gli attributi impostati con i parametri della richiesta HTTP POST della registrazione
     * @return MCliente
     */
    public static function registrationUser(): MCliente
    {
        $utente = new MCliente();
        $utente->setNome($_POST['nome']);
        $utente->setCognome($_POST['cognome']);
        $utente->setEmail($_POST['email']);
        $utente->setPassword($_POST['password']);
        $utente->setDataNascita(self::getDateFromRegistrazione());
        $utente->setIscrizione(MData::getCurrentTime());
        $utente->setAttivato(FALSE);
        return $utente;
    }

    /**
     * Ritorna un MData ottenuto dai parametri della richiesta HTTP POST della registrazione
     * @return MData
     */
    private static function getDateFromRegistrazione(): MData
    {
        $date=explode("-", $_POST["date"]);
        return new MData($date[0],$date[1],$date[2], 0);
    }

    /**
     * Modifica l'utente passato come parametro con i parametri della richiesta POST di modifica utente
     * @param MUtente $utente
     */
    public static function utenteByPostRequest(MUtente $utente)
    {
        $utente->setNome($_POST['nome']);
        $utente->setCognome($_POST['cognome']);
        $utente->setEmail($_POST['email']);
        $utente->setPassword($_POST['password']);
        $utente->setDataNascita(self::getDateFromRegistrazione());
        $utente->setIscrizione(MData::getCurrentTime());
        $utente->setAttivato(true);
    }

    /**
     * Ritorna un MUtente ottenuto tramite i parametri della richiesta POST dell'aggiunta utente dell'Admin
     * @return MUtente
     */
    public static function aggiuntaUtente(): MUtente
    {
        if($_POST['tipologia'] == 'Cliente')
            $utente = new MCliente();
        else $utente = new MAgenteImmobiliare();
        self::utenteByPostRequest($utente);
        return $utente;
    }

    /**
     * Ritorna true se sono presenti i parametri id e codice
     * @param array $parameters
     * @return bool
     */
    public static function confermaAccountValidator(array $parameters)
    {
        if(key_exists('id', $parameters) && key_exists('codice', $parameters))
            return true;
        else return false;
    }

    /**
     * Ritorna il parametro 'email' della richiesta HTTP POST
     * @return string
     */
    public static function getEmail(): string
    {
        return $_POST['email'];
    }

    /**
     * Ritorna il parametro 'id' della lista parametri ottenuta dall'URL
     * @param array $parameters
     * @return string
     */
    public static function getParametersId(array $parameters): string
    {
        return $parameters['id'];
    }

    /**
     * Ritorna il parametro 'codice' della lista parametri ottenuta dall'URL
     * @param array $parameters
     * @return string
     */
    public static function getParametersCode(array $parameters): string
    {
        return $parameters['codice'];
    }

    /**
     * Ritorna il parametro 'oldPassword' della richiesta HTTP POST
     * @return mixed
     */
    public static function getOldPW(): string
    {
        return $_POST['oldPassword'];
    }

    /**
     * Ritorna il parametro 'password' della richiesta HTTP POST
     * @return mixed
     */
    public static function getNewPW(): string
    {
        return $_POST['password'];
    }

    /**
     * @return bool esistenza del cookie 'token'
     */
    public static function isSetCookie(): bool
    {
        return isset($_COOKIE['token']);
    }

    /**
     * @return string valore del cookie 'token'
     */
    public static function getCookieToken(): string
    {
        return $_COOKIE['token'];
    }

    // ---- IMMOBILE ----

    /**
     * Aggiunge i parametri assenti per la ricerca immobili
     * @param array $parameters
     * @return array
     */
    public static function ricercaParametersFiller(array $parameters): array
    {
        if(!key_exists('pmin', $parameters))
            $parameters['pmin'] = 100;
        if(!key_exists('pmax', $parameters))
            $parameters['pmax'] = 1000000;
        if(!key_exists('gmin', $parameters))
            $parameters['gmin'] = 0;
        if(!key_exists('gmax', $parameters))
            $parameters['gmax'] = 2000;
        return $parameters;
    }

    /**
     * Aggiunge i parametri assenti per il calendario immobile
     * Imposta la data di inizio a oggi se è domenica, a domani se è sabato, alla scorsa domenica se oggi è un giorno feriale
     * @param array $parameters
     * @return array
     * @throws Exception
     */
    public static function calendarioParametersFiller(array $parameters):array
    {
        if(!key_exists('inizio', $parameters))
        {
            if(date('w') == 0)
            {
                $parameters['inizio'] = date('Y-m-d');
                $parameters['fine'] = date('Y-m-d', strtotime('next Saturday'));
            }
            else if(date('w') == 6)
            {
                $parameters['inizio'] = date('Y-m-d', strtotime('next Sunday'));
                $parameters['fine'] = date('Y-m-d', strtotime('next Saturday'));
            }
            else {
                $parameters['inizio'] = date('Y-m-d', strtotime('last Sunday'));
                $parameters['fine'] = date('Y-m-d', strtotime('next Saturday'));
            }
        }
        else if (!key_exists('fine', $parameters))
        {
            $inizio = MData::getMDataFromString($parameters['inizio']);
            $fine = MData::shiftedData($inizio, 7);
            $parameters['fine'] = $fine->getDateString();
        }
        return $parameters;
    }

    /**
     * Trasforma il parametro 'inizio' dell'URL in un MData
     * @param array $parameters
     * @return MData
     */
    public static function calendarioInizio(array $parameters):MData
    {
        $data = MData::getMDataFromString($parameters['inizio']);
        $data->setOrario(7.3);
        return $data;
    }

    /**
     * Trasforma il parametro 'fine' dell'URL in un MData
     * @param array $parameters
     * @return MData
     */
    public static function calendarioFine(array $parameters):MData
    {
        $data = MData::getMDataFromString($parameters['fine']);
        $data->setOrario(20);
        return $data;
    }

    /**
     * Trasforma il parametro 'agInizio' dell'URL in un MData
     * @return MData
     */
    public static function prenotaInizioAgenzia()
    {
        $data = MData::getMDataFromString($_POST['agInizio']);
        $data->setOrario(7.4);
        return $data;
    }

    /**
     * Trasforma il parametro 'agFine' dell'URL in un MData
     * @return MData
     */
    public static function prenotaFineAgenzia()
    {
        $data = MData::getMDataFromString($_POST['agFine']);
        $data->setOrario(20.1);
        return $data;
    }

    /**
     * Ritorna il parametro 'idAg' della richiesta HTTP POST
     * @return mixed
     */
    public static function prenotaAgente()
    {
        return $_POST['idAg'];
    }

    /**
     * Ritorna il parametro 'idIm' della richiesta HTTP POST
     * @return mixed
     */
    public static function prenotaImmobile()
    {
        return $_POST['idIm'];
    }

    /**
     * Ritorna il parametro 'idCl' della richiesta HTTP POST
     * @return mixed
     */
    public static function prenotaCliente()
    {
        return $_POST['idCl'];
    }

    /**
     * Trasforma il parametro 'inizio' della richiesta HTTP POST in un MData
     * Utilizzato per gli orari ricavati dagli eventi di FullCalendar
     * @return MData
     */
    public static function prenotaAppuntamentoInizio(): MData
    {
        return self::calendarDataConverter($_POST['inizio']);
    }

    /**
     * Trasforma il parametro 'fine' della richiesta HTTP POST in un MData
     * Utilizzato per gli orari ricavati dagli eventi di FullCalendar
     * @return MData
     */
    public static function prenotaAppuntamentoFine()
    {
        return self::calendarDataConverter($_POST['fine']);
    }

    /**
     * Converte le stringhe data/ora ottenute dagli eventi di FullCalendar in oggetti MData
     * @param string $received
     * @return MData
     */
    private static function calendarDataConverter(string $received): MData
    {
        $timeString = str_split($received, 24)[0];
        $timeStamp = strtotime($timeString);
        return MData::getMdataFromTimestamp($timeStamp);
    }

    /**
     * Ritorna un oggetto MImmobile dai parametri della richiesta HTTP POST dell'aggiunta immobile
     * @return MImmobile
     */
    public static function immobileByPostRequest(): MImmobile
    {
        $immobile = new MImmobile();
        $immobile->setNome($_POST['nome']);
        $immobile->setComune($_POST['comune']);
        $immobile->setIndirizzo($_POST['indirizzo']);
        $immobile->setGrandezza($_POST['grandezza']);
        $immobile->setPrezzo($_POST['prezzo']);
        $immobile->setDescrizione($_POST['descrizione']);
        $immobile->setTipoAnnuncio($_POST['tipoAnnuncio']);
        $immobile->setTipologia($_POST['tipologia']);
        $immobile->setAttivo(true);
        return $immobile;
    }

    /**
     * Ritorna il valore del parametro 'attiva' della richiesta HTTP POST
     * @return bool
     */
    public static function getAttivaorNot(): bool
    {
        if($_POST['attiva'] === 'true')
            return true;
        else return false;
    }

    public static function getImmobiliURLDecoder(string $parameters)
    {
        return explode('-', $parameters);
    }

    // ---- ADMIN ----

    /**
     * Ritorna il valore del parametro 'id' della richiesta HTTP POST
     * @return string
     */
    public static function generalId(): string
    {
        return $_POST['id'];
    }

    /**
     * Ritorna il parametro 'cliente' della lista parametri ottenuta dall'URL
     * @param array $parameters
     * @return mixed
     */
    public static function getIdCliente(array $parameters)
    {
        return $parameters['cliente'];
    }

    /**
     * Ritorna il parametro 'immobile' della lista parametri ottenuta dall'URL
     * @param array $parameters
     * @return mixed
     */
    public static function getIdImmobile(array $parameters)
    {
        return $parameters['immobile'];
    }

    // --- INSTALLATION ----

    /**
     * Ritorna il valore del parametro 'nomeDB' della richiesta HTTP POST
     * @return string
     */
    public static function getNomeDB(): string
    {
        return $_POST['nomeDB'];
    }

    /**
     * Ritorna il valore del parametro 'passwordDB' della richiesta HTTP POST
     * @return string
     */
    public static function getPasswordDB(): string
    {
        return $_POST['passwordDB'];
    }

    /**
     * Ritorna il valore del parametro 'usernameDB' della richiesta HTTP POST
     * @return string
     */
    public static function getUsernameDB(): string
    {
        return $_POST['usernameDB'];
    }

    /**
     * Ritorna il valore del parametro 'passwordAdmin' della richiesta HTTP POST
     * @return string
     */
    public static function getPasswordAdmin(): string
    {
        return $_POST['passwordAdmin'];
    }

    /**
     * @return bool esistenza del parametro 'populate' della richiesta HTTP POST
     */
    public static function populateDB(): bool
    {
        if(key_exists('populate', $_POST))
            return true;
        else return false;
    }




}