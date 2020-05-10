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

    public function addCliente(Cliente $Cliente):bool{

        if(!in_array($Cliente, $this ->list_Clienti) )
        {

            $this->list_Clienti[] = $Cliente;

        }

        else return false;

    }

    public function removeCliente(Cliente $Cliente):void{

        if(in_array($Cliente, $this ->list_Clienti) )
        {
            unset($this->list_Clienti[array_search($Cliente, $this->list_Clienti)]);
        }
    }



    public function addAgenteImmobiliare(AgenteImmobiliare $AgenteImmobiliare):bool{

        if(!in_array($AgenteImmobiliare, $this ->list_AgentiImmobiliari) )
        {

            $this->list_AgentiImmobiliari[] = $AgenteImmobiliare;

        }
        else return false;

    }

    public function removeAgenteImmobiliare(AgenteImmobiliare $AgenteImmobiliare):void{

        if(in_array($AgenteImmobiliare, $this ->list_AgentiImmobiliari) )
        {
            unset($this->list_Clienti[array_search($AgenteImmobiliare, $this->list_AgentiImmobiliari)]);
        }

    }

    public function addImmobile(Immobile $Immobile):bool{
        if(!in_array($Immobile, $this ->list_Immobili) )
        {

            $this->list_Clienti[] = $Immobile;

        }

        else return false;

    }

    public function removeImmobile(Immobile $Immobile):void{

        if(in_array($Immobile, $this ->list_Immobilii) )
        {
            unset($this->list_Clienti[array_search($Immobile, $this->list_Immobili)]);
        }

    }
    
    
}