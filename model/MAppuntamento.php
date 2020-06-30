<?php


class MAppuntamento
{
    private string $id;
    private MData $orario_inizio;
    private MData $orario_fine;
    private MCliente $cliente;
    private MImmobile $immobile;
    private MAgenteImmobiliare $agenteImmobiliare;


    /**
     * Imposta gli attributi della classe
     * @param MData $inizio
     * @param MData $fine
     * @param MCliente $cliente
     * @param MImmobile $immobile
     * @param MAgenteImmobiliare $agente
     */
    public function setAppuntamento(MData $inizio, MData $fine, MCliente $cliente, MImmobile $immobile, MAgenteImmobiliare $agente): void
    {
        $this->orario_inizio = $inizio;
        $this->orario_fine = $fine;
        $this->immobile = $immobile;
        $this->cliente = $cliente;
        $this->agenteImmobiliare = $agente;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return MCliente
     */
    public function getCliente(): MCliente
    {
        return $this->cliente;
    }

    /**
     * @param MCliente $cliente
     */
    public function setCliente(MCliente $cliente): void
    {
        $this->cliente = $cliente;
    }

    /**
     * @return MImmobile
     */
    public function getImmobile(): MImmobile
    {
        return $this->immobile;
    }

    /**
     * @param MImmobile $immobile
     */
    public function setImmobile(MImmobile $immobile): void
    {
        $this->immobile = $immobile;
    }

    /**
     * @return MAgenteImmobiliare
     */
    public function getAgenteImmobiliare(): MAgenteImmobiliare
    {
        return $this->agenteImmobiliare;
    }

    /**
     * @param MAgenteImmobiliare $agenteImmobiliare
     */
    public function setAgenteImmobiliare(MAgenteImmobiliare $agenteImmobiliare): void
    {
        $this->agenteImmobiliare = $agenteImmobiliare;
    }

    /**
     * @return MData
     */
    public function getOrarioInizio(): MData
    {
        return $this->orario_inizio;
    }

    /**
     * @param MData $orario_inizio
     */
    public function setOrarioInizio(MData $orario_inizio): void
    {
        $this->orario_inizio = $orario_inizio;
    }

    /**
     * @return MData
     */
    public function getOrarioFine(): MData
    {
        return $this->orario_fine;
    }

    /**
     * @param MData $orario_fine
     */
    public function setOrarioFine(MData $orario_fine): void
    {
        $this->orario_fine = $orario_fine;
    }


}