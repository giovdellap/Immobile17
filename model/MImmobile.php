<?php

/**
 * Class MImmobile
 * Classe che descrive l'immobile e le sue caratteristiche
 * @author Della Pelle - Di Domenica - Foderà
 * @package model
 */
class MImmobile implements JsonSerializable
{
    private string $id;
    private string $indirizzo;
    private string $comune;
    private string $nome;
    private string $tipologia;
    private string $tipoAnnuncio;
    private string $descrizione;
    private array  $immagini;
    private int    $prezzo;
    private int    $grandezza;
    private array  $list_appuntamenti;
    private bool   $attivo;

    public function __construct()
    {
        $this->immagini = array();
        $this->list_appuntamenti = array();
    }

    /**
     * @return String
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function isAttivo(): bool
    {
        return $this->attivo;
    }

    /**
     * @param bool $attivo
     */
    public function setAttivo(bool $attivo): void
    {
        $this->attivo = $attivo;
    }

    /**
     * @return String
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param String $nome
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @param String $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return String
     */
    public function getIndirizzo(): string
    {
        return $this->indirizzo;
    }

    /**
     * @param String $indirizzo
     */
    public function setIndirizzo(string $indirizzo): void
    {
        $this->indirizzo = $indirizzo;
    }

    /**
     * @return String
     */
    public function getComune(): string
    {
        return $this->comune;
    }

    /**
     * @param String $comune
     */
    public function setComune(string $comune): void
    {
        $this->comune = $comune;
    }

    /**
     * @return String
     */
    public function getTipologia(): string
    {
        return $this->tipologia;
    }

    /**
     * @param String $tipologia
     */
    public function setTipologia(string $tipologia): void
    {
        $this->tipologia = $tipologia;
    }

    /**
     * @return String
     */
    public function getTipoAnnuncio(): string
    {
        return $this->tipoAnnuncio;
    }

    /**
     * @param String $tipoAnnuncio
     */
    public function setTipoAnnuncio(string $tipoAnnuncio): void
    {
        $this->tipoAnnuncio = $tipoAnnuncio;
    }

    /**
     * @return String
     */
    public function getDescrizione(): string
    {
        return $this->descrizione;
    }

    /**
     * @param String $descrizione
     */
    public function setDescrizione(string $descrizione): void
    {
        $this->descrizione = $descrizione;
    }

    /**
     * Ritorna una descrizione tagliata al 60esimo carattere
     * @return string
     */
    public function getDescrizioneBreve():string
    {
        if(strlen($this->descrizione)<60) {
            $spacesToAdd = 60 - strlen($this->descrizione);
            return $this->descrizione . str_repeat(" ", $spacesToAdd);
        }
        else if (strlen($this->descrizione) == 60)
            return $this->descrizione;
        else {
            return str_split($this->descrizione, 60)[0] . "...";
        }
        //return str_split($this->descrizione,50)[0];
    }

    /**
     * Restituisce una stringa descrizione con il br dell'html al posto di \n
     * @return string
     */
    public function getDescrizioneVista(): string
    {
        return str_replace("\n", "<br>", $this->descrizione);
    }

    /**
     * @return array
     */
    public function getImmagini(): array
    {
        return $this->immagini;
    }

    /**
     * Ritorna la prima immagine dell'immobile in formato base64
     * @return mixed
     */
    public function getPresentationImg(): string
    {
        return $this->immagini[0]->viewImageHTML();
    }

    /**
     * @param array $immagini
     */
    public function setImmagini(array $immagini): void
    {
        $this->immagini = $immagini;
    }

    /**
     * Aggiunta di un oggetto MMedia all'array immagini
     * @param MMedia $immagine
     */
    public function addImmagine(MMedia $immagine): void
    {
        $this->immagini[] = $immagine;
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

    /**
     * Aggiunge un appuntamento alla lista appuntamenti dell'Utente
     * @param MAppuntamento $appuntamento
     * @return bool esito dell'operazione
     */
    public function addAppuntamento(MAppuntamento $appuntamento): bool {

        if(!in_array($appuntamento , $this->list_appuntamenti))
        {
            $this->list_appuntamenti[] = $appuntamento;
            return true;
        }
        else return false;
    }

    /**
     * Se l'appuntamento è nella lista appuntamenti, lo elimina
     * @param MAppuntamento $appuntamento
     */
    public function deleteAppuntamento(MAppuntamento $appuntamento): void{
        if(in_array($appuntamento, $this ->list_appuntamenti) )
        {
            unset($this->list_appuntamenti[array_search($appuntamento, $this->list_appuntamenti)]);
        }
    }

    /**
     * @return array
     */
    public function getListAppuntamenti(): array
    {
        return $this->list_appuntamenti;
    }

    /**
     * @param array $list_appuntamenti
     */
    public function setListAppuntamenti(array $list_appuntamenti): void
    {
        $this->list_appuntamenti = $list_appuntamenti;
    }

    public function jsonSerialize(): array
    {
        $immagini = [];
        foreach ($this->getImmagini() as $item)
        {
            $immagini[] = $item->viewImageHTML();
        }
        return
        [
            'id' => $this->getId(),
            'indirizzo' => $this->getIndirizzo(),
            'comune' => $this->getComune(),
            'nome' => $this->getNome(),
            'tipologia' => $this->getTipologia(),
            'tipoAnnuncio' => $this->getTipoAnnuncio(),
            'descrizione' => $this->getDescrizione(),
            'immagini' => $immagini,
            'prezzo' => $this->getPrezzo(),
            'grandezza' => $this->getGrandezza(),
            'attivo' => $this->isAttivo(),
        ];
    }


}