<?php


class VReceiverProxy
{
    public static function getRequest():bool
    {
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }

    public static function postRequest(): bool
    {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

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
        if(!key_exists('gi', $parameters))
        {
            if(date('w')== 0 || date('w')==6) {

                $parameters['ai'] = date('Y', strtotime('next Monday'));
                $parameters['mi'] = date('m', strtotime('next Monday'));
                $parameters['gi'] = date('d', strtotime('next Monday'));
                $parameters['af'] = date('Y', strtotime('next Sunday'));
                $parameters['mf'] = date('m', strtotime('next Sunday'));
                $parameters['gf'] = date('d', strtotime('next Sunday'));
            }
            else {
                $parameters['ai'] = date('Y', strtotime('last Monday'));
                $parameters['mi'] = date('m', strtotime('last Monday'));
                $parameters['gi'] = date('d', strtotime('last Monday'));
                $parameters['af'] = date('Y', strtotime('next Sunday'));
                $parameters['mf'] = date('m', strtotime('next Sunday'));
                $parameters['gf'] = date('d', strtotime('next Sunday'));
            }
        }
        return $parameters;
    }

    public static function calendarioInizio(array $parameters):MData
    {
        return new MData($parameters["ai"], $parameters["mi"], $parameters["gi"], 7.3);
    }

    public static function calendarioFine(array $parameters):MData
    {
        return new MData($parameters["af"], $parameters["mf"], $parameters["gf"], 20);
    }

    public static function prenotaInizioAgenzia()
    {
        return new MData($_POST['anno'], $_POST['mese'], $_POST['giorno'], 8);
    }

    public static function prenotaFineAgenzia()
    {
        return new MData($_POST['anno'], $_POST['mese'], $_POST['giorno'], 20);
    }

    public static function prenotaAgente()
    {
        return $_POST['idAg'];
    }

    public static function prenotaImmobile()
    {
        return $_POST['idImm'];
    }

    public static function prenotaAppuntamentoInizio()
    {
        return new MData($_POST['anno'], $_POST['mese'], $_POST['giorno'], $_POST['inizio']);
    }

    public static function prenotaAppuntamentoFine()
    {
        return new MData($_POST['anno'], $_POST['mese'], $_POST['giorno'], $_POST['fine']);
    }

    public static function immobileByPostRequest(): MImmobile
    {
        $immobile = new MImmobile();
        $immobile->setNome($_POST['nome']);
        $immobile->setComune($_POST['comune']);
        $immobile->setIndirizzo($_SERVER['indirizzo']);
        $immobile->setGrandezza($_SERVER['grandezza']);
        $immobile->setPrezzo($_SERVER['prezzo']);
        $immobile->setDescrizione($_SERVER['descrizione']);
        $immobile->setTipoAnnuncio($_SERVER['tipoAnnuncio']);
        $immobile->setTipologia($_SERVER['tipologia']);
        $immobile->setAttivo($_SERVER['attivo']);
        return$immobile;
    }
}