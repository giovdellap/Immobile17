<?php


class Appuntamento
{
    private String $id;
    private Data $orario_inizio;
    private Data $orario_fine;
    private Cliente $cliente;
    private Immobile $immobile;
    private AgenteImmobiliare $agenteImmobiliare;

    /**
     * @return String
     */
    public function getId(): String
    {
        return $this->id;
    }

    /**
     * @param String $id
     */
    public function setId(String $id): void
    {
        $this->id = $id;
    }

    /**
     * @return Cliente
     */
    public function getCliente(): Cliente
    {
        return $this->cliente;
    }

    /**
     * @param Cliente $cliente
     */
    public function setCliente(Cliente $cliente): void
    {
        $this->cliente = $cliente;
    }

    /**
     * @return Immobile
     */
    public function getImmobile(): Immobile
    {
        return $this->immobile;
    }

    /**
     * @param Immobile $immobile
     */
    public function setImmobile(Immobile $immobile): void
    {
        $this->immobile = $immobile;
    }

    /**
     * @return AgenteImmobiliare
     */
    public function getAgenteImmobiliare(): AgenteImmobiliare
    {
        return $this->agenteImmobiliare;
    }

    /**
     * @param AgenteImmobiliare $agenteImmobiliare
     */
    public function setAgenteImmobiliare(AgenteImmobiliare $agenteImmobiliare): void
    {
        $this->agenteImmobiliare = $agenteImmobiliare;
    }

    /**
     * @return Data
     */
    public function getOrarioInizio(): Data
    {
        return $this->orario_inizio;
    }

    /**
     * @param Data $orario_inizio
     */
    public function setOrarioInizio(Data $orario_inizio): void
    {
        $this->orario_inizio = $orario_inizio;
    }

    /**
     * @return Data
     */
    public function getOrarioFine(): Data
    {
        return $this->orario_fine;
    }

    /**
     * @param Data $orario_fine
     */
    public function setOrarioFine(Data $orario_fine): void
    {
        $this->orario_fine = $orario_fine;
    }


}