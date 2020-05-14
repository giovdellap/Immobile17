<?php


class MAgenzia
{
    private array      $list_Clienti;
    private array      $list_AgentiImmobiliari;
    private array      $list_Immobili;
    private MCalendario $calendario;

    /**
     * @return mixed
     */
    public function getCalendario(): MCalendario
    {
        return $this->calendario;
    }

    /**
     * @param mixed $calendario
     */
    public function setCalendario(MCalendario $calendario)
    {
        $this->calendario = $calendario;
    }

    public function addCliente(MCliente $Cliente):bool{

        if(!in_array($Cliente, $this ->list_Clienti) )
        {

            $this->list_Clienti[] = $Cliente;

        }

        else return false;

    }

    public function removeCliente(MCliente $Cliente):void{

        if(in_array($Cliente, $this ->list_Clienti) )
        {
            unset($this->list_Clienti[array_search($Cliente, $this->list_Clienti)]);
        }
    }



    public function addAgenteImmobiliare(MAgenteImmobiliare $AgenteImmobiliare):bool{

        if(!in_array($AgenteImmobiliare, $this ->list_AgentiImmobiliari) )
        {

            $this->list_AgentiImmobiliari[] = $AgenteImmobiliare;

        }
        else return false;

    }

    public function removeAgenteImmobiliare(MAgenteImmobiliare $AgenteImmobiliare):void{

        if(in_array($AgenteImmobiliare, $this ->list_AgentiImmobiliari) )
        {
            unset($this->list_Clienti[array_search($AgenteImmobiliare, $this->list_AgentiImmobiliari)]);
        }

    }

    public function addImmobile(MImmobile $Immobile):bool{
        if(!in_array($Immobile, $this ->list_Immobili) )
        {

            $this->list_Clienti[] = $Immobile;

        }

        else return false;

    }

    public function removeImmobile(MImmobile $Immobile):void{

        if(in_array($Immobile, $this ->list_Immobilii) )
        {
            unset($this->list_Clienti[array_search($Immobile, $this->list_Immobili)]);
        }

    }

    public function checkDisponibilità(MData $orarioinizio, MData $orarioFine): array
    {
        $completed = false;
        $inizio = $orarioinizio;
        $toReturn = array();
        while(!$completed)
        {
            ////
        }

        return $toReturn;
    }

    public function newInizio(MData $inizio): MData
    {
        $newInizio = $inizio;
        if ($inizio >=19.45)
        {
            $newInizio->nextDay();
            $newInizio->setOrario(8.00);
        }
        else $newInizio->incrementoOrario(15);

        return $newInizio;
    }
    
    
}