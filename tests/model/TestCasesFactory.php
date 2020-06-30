<?php

include_once (dirname(__FILE__, 3) . '/autoload.php');

class TestCasesFactory
{

    //---CLIENTI----

    public function createCliente1(): MCliente
    {
        $cliente = new MCliente();
        $cliente->setAttivato(true);
        return $cliente;
    }

    public function createCliente2(): MCliente
    {
        $cliente = new MCliente();
        $cliente->setAttivato(true);
        $appuntamento_1 = $this->createEmptyAppuntamento(13.30);
        $appuntamento_1->setCliente($cliente);
        $cliente->addAppuntamento($appuntamento_1);
        return $cliente;
    }

    //---IMMOBILI----

    public function createImmobile1(): MImmobile
    {
        $immobile = new MImmobile();
        $immobile->setAttivo(true);
        return $immobile;
    }

    public function createImmobile2(): MImmobile
    {
        $immobile = new MImmobile();
        $immobile->setAttivo(true);
        $appuntamento = $this->createEmptyAppuntamento(13.30);
        $appuntamento->setImmobile($immobile);
        $immobile->addAppuntamento($appuntamento);
        return $immobile;
    }

    //---AGENTI----

    public function createAgente1()
    {
        $agente = new MAgenteImmobiliare();
        $agente->setAttivato(true);
        return $agente;
    }

    public function createAgente2()
    {
        $agente = new MAgenteImmobiliare();
        $agente->setAttivato(true);
        $appuntamento = $this->createEmptyAppuntamento(13.30);
        $appuntamento->setAgenteImmobiliare($agente);
        $agente->addAppuntamento($appuntamento);
        return $agente;
    }

    //---APPUNTAMENTO----

    public function createEmptyAppuntamento(float $orario): MAppuntamento
    {
        $appuntamento = new MAppuntamento();
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

    public function createAgenzia(): MAgenzia
    {
        $agenzia = new MAgenzia();

        //AGENTI
        $agente1 = new MAgenteImmobiliare();
        $agente1->setNome("agente1");
        $agente1->setAttivato(true);
        $agenzia->addAgenteImmobiliare($agente1);
        $agente2 = new MAgenteImmobiliare();
        $agente2->setNome("agente2");
        $agente2->setAttivato(true);
        $agenzia->addAgenteImmobiliare($agente2);

        //IMMOBILI
        $immobile1 = new MImmobile();
        $immobile1->setId("immobile1");
        $immobile1->setAttivo(true);
        $agenzia->addImmobile($immobile1);
        $immobile2 = new MImmobile();
        $immobile2->setId("immobile2");
        $immobile2->setAttivo(true);
        $agenzia->addImmobile($immobile2);

        //CLIENTI
        $cliente1 = new MCliente();
        $cliente1->setNome("cliente1");
        $cliente1->setAttivato(true);
        $agenzia->addCliente($cliente1);
        $cliente2 = new MCliente();
        $cliente2->setNome("cliente2");
        $cliente2->setAttivato(true);
        $agenzia->addCliente($cliente2);

        //APPUNTAMENTO 1
        $appuntamento1 = $this->createEmptyAppuntamento(8.15);
        $appuntamento1->setImmobile($immobile1);
        $appuntamento1->setAgenteImmobiliare($agente1);
        $appuntamento1->setCliente($cliente1);
        $agenzia->getCalendario()->addAppuntamento($appuntamento1);

        //APPUNTAMENTO 2
        $appuntamento2 = $this->createEmptyAppuntamento(10.15);
        $appuntamento2->setImmobile($immobile2);
        $appuntamento2->setAgenteImmobiliare($agente1);
        $appuntamento2->setCliente($cliente1);
        $agenzia->getCalendario()->addAppuntamento($appuntamento2);

        //APPUNTAMENTO 3
        $appuntamento3 = $this->createEmptyAppuntamento(10.15);
        $appuntamento3->setImmobile($immobile1);
        $appuntamento3->setAgenteImmobiliare($agente2);
        $appuntamento3->setCliente($cliente2);
        $agenzia->getCalendario()->addAppuntamento($appuntamento3);

        return $agenzia;
    }

    public function showAppuntamento(MAppuntamento $appuntamento): void
    {
        echo ("\n");
        echo ("INIZIO: ".$appuntamento->getOrarioInizio()->getOrario()."\n");
        echo ("FINE: ".$appuntamento->getOrarioFine()->getOrario()."\n");
        echo ("AGENTE: ".$appuntamento->getAgenteImmobiliare()->getNome()."\n");
        echo ("CLIENTE: ".$appuntamento->getCliente()->getNome()."\n");
        echo ("IMMOBILE: ".$appuntamento->getImmobile()->getId()."\n");
        echo ("\n-------------------------------------------------");
    }

    public function showListAppuntamenti(array $appuntamenti):void
    {
        foreach ($appuntamenti as &$item)
            $this->showAppuntamento($item);
    }
}