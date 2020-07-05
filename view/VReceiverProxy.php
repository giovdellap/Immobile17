<?php


class VReceiverProxy
{

    // ---- GENERAL METHODS ----

    public static function getRequest():bool
    {
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }

    public static function postRequest(): bool
    {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    // ---- UTENTE ----

    public static function loginUser()
    {
        $utente = new MUtente();
        $utente->setEmail($_POST['email']);
        $utente->setPassword($_POST['password']);
        return $utente;
    }

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

    private static function getDateFromRegistrazione(): MData
    {
        $date=explode("-", $_POST["date"]);
        return new MData($date[0],$date[1],$date[2], 0);
    }

    // ---- IMMOBILE ----

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

    public static function calendarioInizio(array $parameters):MData
    {
        $data = MData::getMDataFromString($parameters['inizio']);
        $data->setOrario(7.3);
        return $data;
    }

    public static function calendarioFine(array $parameters):MData
    {
        $data = MData::getMDataFromString($parameters['fine']);
        $data->setOrario(20);
        return $data;
    }

    public static function prenotaInizioAgenzia()
    {
        $data = MData::getMDataFromString($_POST['agInizio']);
        $data->setOrario(7.4);
        return $data;
    }

    public static function prenotaFineAgenzia()
    {
        $data = MData::getMDataFromString($_POST['agFine']);
        $data->setOrario(20.1);
        return $data;
    }

    public static function prenotaAgente()
    {
        return $_POST['idAg'];
    }

    public static function prenotaImmobile()
    {
        return $_POST['idIm'];
    }

    public static function prenotaAppuntamentoInizio()
    {
        return self::calendarDataConverter($_POST['inizio']);
    }

    public static function prenotaAppuntamentoFine()
    {
        return self::calendarDataConverter($_POST['fine']);
    }

    private static function calendarDataConverter(string $received): MData
    {
        $timeString = str_split($received, 24)[0];
        $timeStamp = strtotime($timeString);
        return MData::getMdataFromTimestamp($timeStamp);
    }

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
        $immobile->setAttivo($_POST['attivo']);
        return$immobile;
    }

    /**
     * Può essere true o false
     * @return bool
     */
    public static function getAttivaorNot(): bool
    {
        return $_POST['attiva'];
    }

    // ---- ADMIN ----

    public static function generalId(): string
    {
        return $_POST['id'];
    }


}