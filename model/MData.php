<?php


class MData
{
    private int $giorno;
    private int $mese;
    private int $anno;
    private float $orario;


    public function __construct(int $anno, int $mese, int $giorno, float $orario)
    {
        $this->anno = $anno;
        $this->mese = $mese;
        $this->giorno = $giorno;
        $this->orario = $orario;
    }

    /**
     * @return float
     */
    public function getOrario(): float
    {
        return round($this->orario, 2);
    }

    /**
     * @param float $orario
     */
    public function setOrario(float $orario): void
    {
        $this->orario = round($orario,2);
    }

    /**
     * @return int
     */
    public function getGiorno(): int
    {
        return $this->giorno;
    }

    /**
     * @param int $giorno
     */
    public function setGiorno(int $giorno): void
    {
        $this->giorno = $giorno;
    }

    /**
     * @return int
     */
    public function getMese(): int
    {
        return $this->mese;
    }

    /**
     * @param int $mese
     */
    public function setMese(int $mese): void
    {
        $this->mese = $mese;
    }

    /**
     * @return int
     */
    public function getAnno(): int
    {
        return $this->anno;
    }

    /**
     * @param int $anno
     */
    public function setAnno(int $anno): void
    {
        $this->anno = $anno;
    }

    /**
     * Cambia la data al giorno successivo
     */
    public function nextDay() : void
    {
        $numDays = cal_days_in_month(CAL_GREGORIAN, $this->mese, $this->anno);
        if($this->giorno == $numDays)
        {
            if($this->mese == 12)
            {
                ++$this->anno;
                $this->mese = 1;
                $this->giorno = 1;
            }
            else
            {
                ++$this->mese;
                $this->giorno = 1;
            }
        }
        else ++$this->giorno;
    }

    /**
     * Incrementa l'orario di $incremento
     * @param int $incremento (minuti)
     */
    public function incrementoOrario(int $incremento): void
    {
        $ora = intval($this->orario);
        $minuto = ($this->orario - $ora)*100;
        if($incremento > 0)
        {
            $minuto = $minuto + $incremento;
            while($minuto > 60)
            {
                $minuto = $minuto - 60;
                ++$ora;
            }
        }
        else
        {
            $modulo = $incremento*(-1);
            $minuto = $minuto - $modulo;
            while($minuto < 0)
            {
                $minuto = 60 + $minuto;
                --$ora;
            }
        }
        $this->orario = $ora + $minuto/100;

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
    public static function getDateString(MData $data): string
    {
        return $data->getAnno() . "-" . $data->getMese() . "-" . $data->getGiorno();
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
        $date = $this::getDateString($this);
        $finalDate = new Datetime($date);
        if($days > 0)
            $finalDate->add(new DateInterval("P".$days."D"));
        else $finalDate->sub(new DateInterval("P".abs($days)."D"));
        $mdata = self::getMDataFromString($finalDate->format("Y-m-d"));
        $this->anno = $mdata->getAnno();
        $this->mese = $mdata->getMese();
        $this->giorno = $mdata->getGiorno();
    }

    public static function shiftedData(MData $data, int $days): MData
    {
        $toReturn = clone $data;
        $toReturn->sumDays($days);
        return $toReturn;
    }

    public function getfullDataString()
    {
        $ora = intval($this->getOrario());
        $minuto = ($this->getOrario() - $ora)*100;
        return self::getDateString($this)."T".$ora.":".$minuto.":00";
    }



}