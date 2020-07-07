<?php

class MCalendario
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
     * @param MAppuntamento $appuntamento
     * @return bool
     */
    public function addAppuntamento(MAppuntamento $appuntamento): bool
    {
        //controlli
        $context = new MValidatorContext($appuntamento);
        $valido = $context->validateAppuntamento(new MValidatorImmobile());
        if($valido)
            $valido = $context->validateAppuntamento(new MValidatorAgenteImmobiliare());
        if($valido)
            $valido = $context->validateAppuntamento(new MValidatorCliente());
        echo('immobile' . $context->validateAppuntamento(new MValidatorImmobile()));
        echo('agente' . $context->validateAppuntamento(new MValidatorAgenteImmobiliare()));
        echo('cliente' . $context->validateAppuntamento(new MValidatorCliente()));

        if($valido)
        {
            $this->appuntamenti[] = $appuntamento;
            $appuntamento->getAgenteImmobiliare()->addAppuntamento($appuntamento);     //aggiunge l'appuntamento alle liste appuntamenti di agente,
            $appuntamento->getCliente()->addAppuntamento($appuntamento);               //cliente,immobile
            $appuntamento->getImmobile()->addAppuntamento($appuntamento);
            return true;
        }
        else return false;
    }
    
    /**
     * Elimina un appuntamento dal calendario e dagli appuntamenti dei soggetti coinvolti.
     * @param MAppuntamento $appuntamento
     */
    public function deleteAppuntamento(MAppuntamento $appuntamento): void
    {
        if(in_array($appuntamento, $this->appuntamenti))
            unset($this->appuntamenti[array_search($appuntamento, $this->appuntamenti)]);
        $appuntamento->getAgenteImmobiliare()->deleteAppuntamento($appuntamento);
        $appuntamento->getCliente()->deleteAppuntamento($appuntamento);
        $appuntamento->getImmobile()->deleteAppuntamento($appuntamento);
    }

    /**
     * @return array
     */
    public function getAppuntamenti(): array
    {
        return $this->appuntamenti;
    }

}

