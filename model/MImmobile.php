<?php


class MImmobile
{
    private String $id;
    private String $indirizzo;
    private String $comune;
    private String $tipologia;
    private String $tipoAnnuncio;
    private String $descrizione;
    private array  $immagini;
    private int    $prezzo;
    private int    $grandezza;
    private array  $list_appuntamenti;

    public function __construct()
    {
        $this->immagini = array();
        $this->list_appuntamenti = array();
    }

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
     * @return String
     */
    public function getIndirizzo(): String
    {
        return $this->indirizzo;
    }

    /**
     * @param String $indirizzo
     */
    public function setIndirizzo(String $indirizzo): void
    {
        $this->indirizzo = $indirizzo;
    }

    /**
     * @return String
     */
    public function getComune(): String
    {
        return $this->comune;
    }

    /**
     * @param String $comune
     */
    public function setComune(String $comune): void
    {
        $this->comune = $comune;
    }

    /**
     * @return String
     */
    public function getTipologia(): String
    {
        return $this->tipologia;
    }

    /**
     * @param String $tipologia
     */
    public function setTipologia(String $tipologia): void
    {
        $this->tipologia = $tipologia;
    }

    /**
     * @return String
     */
    public function getTipoAnnuncio(): String
    {
        return $this->tipoAnnuncio;
    }

    /**
     * @param String $tipoAnnuncio
     */
    public function setTipoAnnuncio(String $tipoAnnuncio): void
    {
        $this->tipoAnnuncio = $tipoAnnuncio;
    }

    /**
     * @return String
     */
    public function getDescrizione(): String
    {
        return $this->descrizione;
    }

    /**
     * @param String $descrizione
     */
    public function setDescrizione(String $descrizione): void
    {
        $this->descrizione = $descrizione;
    }

    /**
     * @return array
     */
    public function getImmagini(): array
    {
        return $this->immagini;
    }

    /**
     * @param array $immagini
     */
    public function setImmagini(array $immagini): void
    {
        $this->immagini = $immagini;
    }

    /**
     * @return int
     */
    public function getPrezzo(): int
    {
        return $this->prezzo;
    }

    /**
     * @param int $prezzo
     */
    public function setPrezzo(int $prezzo): void
    {
        $this->prezzo = $prezzo;
    }

    /**
     * @return int
     */
    public function getGrandezza(): int
    {
        return $this->grandezza;
    }

    /**
     * @param int $grandezza
     */
    public function setGrandezza(int $grandezza): void
    {
        $this->grandezza = $grandezza;
    }


    public function addAppuntamento(MAppuntamento $appuntamento): bool {

        if(!in_array($appuntamento , $this->list_appuntamenti))
        {
            $this->list_appuntamenti[] = $appuntamento;
            return true;
        }
        else return false;
    }

    public function deleteAppuntamento(MAppuntamento $appuntamento): void{
        if(in_array($appuntamento, $this ->list_appuntamenti) )
        {
            unset($this->list_Appuntamenti[array_search($appuntamento, $this->list_appuntamenti)]);
        }
    }

    /**
     * @return array
     */
    public function getListAppuntamenti(): array
    {
        return $this->list_appuntamenti;
    }


}