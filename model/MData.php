<?php


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

    public function getNomeMese()
    {
        $mesi=array("Gennaio","Febbraio","Marzo","Aprile","Maggio","Giugno","Luglio","Agosto","Settembre","Ottobre","Novembre","Dicembre");
        return $mesi[$this->mese-1];
    }

    public function getNomeGiorno()
    {
        $giorni=array("Domenica", "Lunedì", "Martedì", "Mercoledì", "Giovedì" ,"Venerdì", "Sabato");
        $sett = date("w", mktime(0,0,0,$this->mese, $this->giorno, $this->anno));
        return $giorni[$sett];
    }

    /**
     * Converte un oggetto MData in una data in formato YYYY-mm-dd
     * @param MData $data
     * @return string
     */
    public function getDateString(): string
    {
        return date("Y-m-d", $this->data->getTimestamp());
    }

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
        $data = new MData($anno, $mese, $giorno, 0);
        return $data;
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

    public static function shiftedData(MData $data, int $days): MData
    {
        $toReturn = $data->dateClone();
        $toReturn->sumDays($days);
        return $toReturn;
    }

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

    public function dateClone()
    {
        return new MData($this->getAnno(), $this->getMese(), $this->getGiorno(), $this->getOrario());
    }

    public function getWeekDay()
    {
        return date("w", $this->data->getTimestamp());
    }

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



}