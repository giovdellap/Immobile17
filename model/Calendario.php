<?php

class Calendario
{
    private array $appuntamenti;
    
    public  function __construct()
    {
        $this->appuntamenti = array();
    }
    
    public function fromFoundation(array $appuntamenti): void
    {
        $this->appuntamenti = $appuntamenti;
        //forse vanno costruite le list_appuntamenti di tutti gli altri a partire da quella generale
    }
    
    /**
     * Controlla se un appuntamento da aggiungere è compatibile con lo stato del calendario.
     * In caso affermativo, lo aggiunge al calendario e agli appuntamenti di immobile, agente immobiliare e cliente coinvolti.
     * 
     * @param Appuntamento $appuntamento
     * @return bool
     */
    public function addAppuntamento(Appuntamento $appuntamento): bool
    {
        $valido = true;//false
        //controlli
        if($valido)
        {
            $this->appuntamenti[] = $appuntamento;
            $appuntamento->getAgenteImmobiliare()->addAppuntamento($appuntamento);
            $appuntamento->getCliente()->addAppuntamento($appuntamento);
            $appuntamento->getImmobile()->addAppuntamento($appuntamento);
            return true;
        }
        else return false;
    }
    
    /**
     * Elimina un appuntamento dal calendario e dagli appuntamenti dei soggetti coinvolti.
     * @param Appuntamento $appuntamento
     */
    public function deleteAppuntamento(Appuntamento $appuntamento): void
    {
        if(in_array($appuntamento, $this->appuntamenti))
            unset($this->appuntamenti[array_search($appuntamento, $$this->appuntamenti)]);
        $appuntamento->getAgenteImmobiliare()->deleteAppuntamento($appuntamento);
        $appuntamento->getCliente()->deleteAppuntamento($appuntamento);
        $appuntamento->getImmobile()->deleteAppuntamento($appuntamento);
    }
}

