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
        return FObject::getMDataFromString(date("Y-m-d"));
    }

}