<?php


class Agenzia
{
    private array      $list_Clienti;
    private array      $list_AgentiImmobiliari;
    private array      $list_Immobili;
    private Calendario $calendario;

    /**
     * @return mixed
     */
    public function getCalendario()
    {
        return $this->calendario;
    }

    /**
     * @param mixed $calendario
     */
    public function setCalendario($calendario)
    {
        $this->calendario = $calendario;
    }

    public function addCliente($Cliente):void{

    }

    public function removeCliente($Cliente):void{

    }

    public function addAgenteImmobiliare($AgenteImmobiliare):void{


    }

    public function removeAgenteImmobiliare($AgenteImmobiliare):void{


    }

    public function addImmobile($Immobile):void{


    }

    public function removeImmobile($Immobile):void{


    }
    
    
}