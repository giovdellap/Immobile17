<?php

/**
 * Class MData
 * Gestisce date e orari sotto ogni aspetto.
 * Contiene un oggetto DateTime e metodi per la sua modifica e visualizzazione.
 * I metodi per la visualizzazione ritornano stringhe in formati accettati da componenti esterne dei package Foundation e View
 * @author Della Pelle - Di Domenica - Foderà
 * @package model
 */
class MData
{
    private DateTime $data;

    public function __construct(int $anno, int $mese, int $giorno, float $orario)
    {
        $this->data = new DateTime();
        $this->data->setDate($anno, $mese, $giorno);
        $ora = intval($orario);
        $minuto = round(($orario - $ora), 2)*100;
        $this->data->setTime(0,0);
        $this->data->modify('+ '. $ora . ' hours');
        $this->data->modify('+'.$minuto.' minutes');
    }

    /**
     * @return float
     */
    public function getOrario(): float
    {
        $ora = date("G", $this->data->getTimestamp());
        $minuto = date("i", $this->data->getTimestamp());
        return round($ora+($minuto/100),2, PHP_ROUND_HALF_UP);
    }

    /**
     * @param float $orario
     */
    public function setOrario(float $orario): void
    {
        $ora = intval($orario);
        $minuto = ($orario - $ora)*100;
        $this->data->setTime(0,0);
        $this->data->modify('+ '. $ora . ' hours');
        $this->data->modify('+'.$minuto.' minutes');
    }

    /**
     * @return int
     */
    public function getGiorno(): int
    {
        return date("d", $this->data->getTimestamp());
    }

    /**
     * @param int $giorno
     */
    public function setGiorno(int $giorno): void
    {
        $this->data->setDate($this->getAnno(), $this->getMese(), $giorno);
    }

    /**
     * @return int
     */
    public function getMese(): int
    {
        return date("n", $this->data->getTimestamp());
    }

    /**
     * @param int $mese
     */
    public function setMese(int $mese): void
    {
        $this->data->setDate($this->getAnno(), $mese, $this->getGiorno());
    }

    /**
     * @return int
     */
    public function getAnno(): int
    {
        return date("Y", $this->data->getTimestamp());
    }

    /**
     * @param int $anno
     */
    public function setAnno(int $anno): void
    {
        $this->data->setDate($anno, $this->getMese(), $this->getGiorno());
    }

    /**
     * Cambia la data al giorno successivo
     */
    public function nextDay() : void
    {
        $this->sumDays(1);
    }

    /**
     * Incrementa l'orario di $incremento
     * @param int $incremento (minuti)
     */
    public function incrementoOrario(int $incremento): void
    {
        if($incremento > 0)
            $this->data->modify("+".$incremento." minutes");
        else $this->data->modify("-".abs($incremento)." minutes");

    }

    /**
     * Crea un MData con la data attuale
     * @return MData
     */
    public static function getCurrentTime(): MData
    {
        return self::getMDataFromString(date("Y-m-d"));
    }

    /**
     * Ritorna una stringa data in formato YYYY-mm-dd
     * @return string
     */
    public function getDateString(): string
    {
        return date("Y-m-d", $this->data->getTimestamp());
    }

    /**
     * Ritorna una stringa data in formato dd/mm/YYYY
     * @return string
     */
    public function getDateFormat(): string
    {
        return date("d/m/Y", $this->data->getTimestamp());
    }

    /**
     * Converte una stringa data in formato YYYY--mm--dd in un MData
     * @param string $str
     * @return MData
     */
    public static function getMDataFromString(string $str): MData
    {
        list($anno, $mese, $giorno) = explode("-", $str);
        return new MData($anno, $mese, $giorno, 0);
    }

    /**
     * Aggiunge o sottrae il numero di giorni passato come parametro
     * @param int $days
     * @throws Exception
     */
    public function sumDays(int $days)
    {
        if($days > 0)
            $this->data->modify("+".$days." days");
        else $this->data->modify("-".abs($days)." days");
    }

    /**
     * Applica sumDays ad una copia dell'MData passato come parametro e lo ritorna
     * @param MData $data
     * @param int $days
     * @return MData
     * @throws Exception
     */
    public static function shiftedData(MData $data, int $days): MData
    {
        $toReturn = $data->dateClone();
        $toReturn->sumDays($days);
        return $toReturn;
    }

    /**
     * Ritorna data e ora in formato accettabile dal calendario presente nella View
     * @return string
     */
    public function getFullDataString()
    {
        $ora = date("G", $this->data->getTimestamp());
        $minuto = date("i", $this->data->getTimestamp());
        return $this->getDateString()."T".$this->get2digit($ora).":".$this->get2digit($minuto).":00";
    }

    /**
     * Se l'intero passato come parametro ha una sola cifra, ritorna una stringa con l'intero preceduto da uno 0.
     * Altrimenti ritorna una stringa rappresentante l'intero
     * @param int $val
     * @return string
     */
    private function get2digit(int $val)
    {
        if(strlen(strval($val))===1)
            return '0'.strval($val);
        else return strval($val);
    }

    /**
     * Ritorna una copia dell'oggetto
     * @return MData
     */
    public function dateClone()
    {
        return new MData($this->getAnno(), $this->getMese(), $this->getGiorno(), $this->getOrario());
    }

    /**
     * Ritorna il giorno della settimana
     * @return false|string
     */
    public function getWeekDay()
    {
        return date("w", $this->data->getTimestamp());
    }

    /**
     * Ritorna un MData da un timeStamp passato come parametro
     * @param int $timeStamp
     * @return MData
     */
    public static function getMdataFromTimestamp(int $timeStamp): MData
    {
        $anno = date("Y", $timeStamp);
        $mese = date("m", $timeStamp);
        $giorno = date("d", $timeStamp);
        $ora = date("G", $timeStamp);
        $minuto = date("i", $timeStamp);
        $orario = $ora + ($minuto/100);
        return new MData($anno, $mese, $giorno, $orario);
    }

    /**
     * Ritorna un MData con data e orario attuali
     * @return MData
     */
    public static function getToday(): MData
    {
        $ora = date("G");
        $minuto = date("i");
        $orario = $ora + ($minuto/100);

        return new MData(date("Y", strtotime("today")),
                        date("m", strtotime("today")),
                        date("d", strtotime("today")), $orario);
    }

    public function minutoTest()
    {
        $minuto = date("i", $this->data->getTimestamp());
        echo ('lalala '.$minuto);
    }

    /**
     * Ritorna l'orario in formato hh:mm
     * @return string
     */
    public function getTimeFormat(): string
    {
        $ora = intval($this->getOrario());
        $minuto = round(($this->getOrario() - $ora), 2)*100;
        return strval($this->get2digit($ora)) . ":" . strval($this->get2digit($minuto));
    }



}