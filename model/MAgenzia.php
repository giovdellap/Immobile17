<?php


class MAgenzia
{
    private array       $list_Clienti;
    private array       $list_AgentiImmobiliari;
    private array       $list_Immobili;
    private MCalendario $calendario;

    public function __construct()
    {
        $this->list_AgentiImmobiliari = array();
        $this->list_Clienti = array();
        $this->list_Immobili = array();
        $this->calendario = new MCalendario();
    }

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

        if(!in_array($Cliente, $this ->list_Clienti) ) {
            $this->list_Clienti[] = $Cliente;
            return true;
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
            return true;
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
            return true;
        }

        else return false;

    }

    public function removeImmobile(MImmobile $Immobile):void{

        if(in_array($Immobile, $this ->list_Immobilii) )
        {
            unset($this->list_Clienti[array_search($Immobile, $this->list_Immobili)]);
        }

    }

    public function checkDisponibilità(MCliente $cliente, MImmobile $immobile, MData $orarioinizio, MData $orariofine): array
    {
        $toReturn = array();
        $toCycleInizio = clone $orarioinizio;
        $toCycleFine = clone $orarioinizio;
        $toCycleFine->incrementoOrario(30);

        while ($toCycleInizio->getOrario() <= $orariofine->getOrario()) {

            foreach ($this->list_AgentiImmobiliari as &$agenti)
            {
                $appDisp = new MAppuntamento(0000);
                $inizio = clone $toCycleInizio;
                $fine = clone $toCycleFine;
                $appDisp->setAppuntamento($inizio, $fine, $cliente, $immobile, $agenti);

                echo ("\n");
                echo ("INIZIO: ".$appDisp->getOrarioInizio()->getOrario()."\n");
                echo ("FINE: ".$appDisp->getOrarioFine()->getOrario()."\n");
                echo ("AGENTE: ".$appDisp->getAgenteImmobiliare()->getNome()."\n");
                echo ("CLIENTE: ".$appDisp->getCliente()->getNome()."\n");
                echo ("IMMOBILE: ".$appDisp->getImmobile()->getId()."\n");

                $context = new MValidatorContext($appDisp);
                $valido = $context->validateAppuntamento(new MValidatorImmobile());
                if ($valido)
                    $valido = $context->validateAppuntamento(new MValidatorAgenteImmobiliare());
                if ($valido)
                    $valido = $context->validateAppuntamento(new MValidatorCliente());
                if ($valido)
                    $toReturn[] = $appDisp;

            }
            $toCycleInizio->incrementoOrario(15);
            $toCycleFine->incrementoOrario(15);

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