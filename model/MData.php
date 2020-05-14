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
        return $this->orario;
    }

    /**
     * @param float $orario
     */
    public function setOrario(float $orario): void
    {
        $this->orario = $orario;
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

}