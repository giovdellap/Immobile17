<?php

//require (dirname(__FILE__, 3) . '/autoload.php');

class TestCasesFactory
{

    //---CLIENTI----

    public function createCliente1(): MCliente
    {
        return new MCliente();
    }

    public function createCliente2(): MCliente
    {
        $cliente = new MCliente();
        $appuntamento_1 = $this->createEmptyAppuntamento(13.30);
        $appuntamento_1->setCliente($cliente);
        $cliente->addAppuntamento($appuntamento_1);
        return $cliente;
    }

    //---IMMOBILI----

    public function createImmobile1(): MImmobile
    {
        return new MImmobile();
    }

    public function createImmobile2(): MImmobile
    {
        $immobile = new MImmobile();
        $appuntamento = $this->createEmptyAppuntamento(13.30);
        $appuntamento->setImmobile($immobile);
        $immobile->addAppuntamento($appuntamento);
        return $immobile;
    }

    //---AGENTI----

    public function createAgente1()
    {
        return new MAgenteImmobiliare();
    }

    public function createAgente2()
    {
        $agente = new MAgenteImmobiliare();
        $appuntamento = $this->createEmptyAppuntamento(13.30);
        $appuntamento->setAgenteImmobiliare($agente);
        $agente->addAppuntamento($appuntamento);
        return $agente;
    }

    //---APPUNTAMENTO----

    public function createEmptyAppuntamento(float $orario): MAppuntamento
    {
        $appuntamento = new MAppuntamento(1);
        $inizio = new MData(2020, 5, 15, $orario);
        $appuntamento->setOrarioInizio($inizio);
        $fine = new MData(2020, 5, 15, $orario);
        $fine->incrementoOrario(30);
        $appuntamento->setOrarioFine($fine);
        return $appuntamento;
    }

    public function setAppuntamento(MAppuntamento $appuntamento, MCliente $cliente, MAgenteImmobiliare $agente, MImmobile $immobile): MAppuntamento
    {
        $appuntamento->setAgenteImmobiliare($agente);
        $appuntamento->setCliente($cliente);
        $appuntamento->setImmobile($immobile);
        return $appuntamento;
    }
    //---CALENDARIO----

    public function createEmptyCalendario(): MCalendario
    {
        return new MCalendario();

    }

    public function createCalendario1(): MCalendario
    {
        $cliente_1 = $this->createCliente1();
        $agente = $this->createAgente1();
        $immobile = $this->createImmobile1();
        $appuntamento = $this->createEmptyAppuntamento(13.30);
        $appuntamento->setCliente($cliente_1);
        $appuntamento->setAgenteImmobiliare($agente);
        $appuntamento->setImmobile($immobile);
        $calendario = new MCalendario();
        $calendario->addAppuntamento($appuntamento);
        return $calendario;
    }

}