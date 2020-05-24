<?php


use PHPUnit\Framework\TestCase;
include_once (dirname(__FILE__, 3) . '/autoload.php');
require_once 'TestCasesFactory.php';

class MCalendarioTest extends TestCase
{
    /**
     * Dati in ingresso: calendario vuoto
     * Operazione: aggiunta appuntamento
     * Dati in uscita: ok
     */
    public function testAdd_1()
    {
        $factory = new TestCasesFactory();
        $calendario = $factory->createEmptyCalendario();
        $cliente = $factory->createCliente1();
        $agente = $factory->createAgente1();
        $immobile = $factory->createImmobile1();
        $appuntamento = new MAppuntamento(1);
        $inizio = new MData(2020, 5, 17, 13.30);
        $fine = new MData(2020, 5, 17, 14.00);
        $appuntamento->setAppuntamento($inizio, $fine, $cliente, $immobile, $agente);
        $calendario->addAppuntamento($appuntamento);
        $ok = false;
        if(in_array($appuntamento, $cliente->getListAppuntamenti()))
            if(in_array($appuntamento, $agente->getListAppuntamenti()))
                if(in_array($appuntamento, $immobile->getListAppuntamenti()))
                    $ok = true;
                $this->assertTrue($ok);
    }

    /**
     * Dati in ingresso: Calendario1
     * Operazione: aggiunta nuovo appuntamento immobile 14.45
     * Dati in uscita true
     */
    public function testAdd_2()
    {
        $factory = new TestCasesFactory();
        $calendario = $factory->createCalendario1();
        $immobile = $calendario->getAppuntamenti()[0]->getImmobile();
        $agente = $calendario->getAppuntamenti()[0]->getAgenteImmobiliare();
        $cliente = $factory->createCliente1();
        $appuntamento = $factory->createEmptyAppuntamento(14.45);
        $appuntamento->setImmobile($immobile);
        $appuntamento->setAgenteImmobiliare($agente);
        $appuntamento->setCliente($cliente);
        $this->assertTrue($calendario->addAppuntamento($appuntamento));
    }

    /**
     * Dati in ingresso: Calendario1
     * Operazione: aggiunta nuovo appuntamento immobile 13.30
     * Dati in uscita false
     */
    public function testAdd_3()
    {
        $factory = new TestCasesFactory();
        $calendario = $factory->createCalendario1();
        $immobile = $calendario->getAppuntamenti()[0]->getImmobile();
        $agente = $factory->createAgente1();
        $cliente = $factory->createCliente1();
        $appuntamento = $factory->createEmptyAppuntamento(13.30);
        $appuntamento = $factory->setAppuntamento($appuntamento, $cliente, $agente, $immobile);
        $this->assertTrue(!($calendario->addAppuntamento($appuntamento)));
    }

    /**
     * Dati in ingresso: Calendario1
     * Operazione: eliminazione appuntamento 13.30
     * Dati in uscita: calendario e liste appuntamenti vuoti
     */
    public function testDelete_1()
    {
        $factory = new TestCasesFactory();
        $calendario = $factory->createCalendario1();
        $appuntamento = $calendario->getAppuntamenti()[0];
        $cliente = $appuntamento->getCliente();
        $agente = $appuntamento->getAgenteImmobiliare();
        $immobile = $appuntamento->getImmobile();
        $calendario->deleteAppuntamento($appuntamento);
        $ok = (sizeof($calendario->getAppuntamenti()) === 0);
        if($ok)
            $ok = (sizeof($agente->getListAppuntamenti()) === 0);
        if($ok)
            $ok = (sizeof($cliente->getListAppuntamenti()) === 0);
        if ($ok)
            $ok = (sizeof($immobile->getListAppuntamenti()) === 0);
        $this->assertTrue($ok);
    }

    /**
     * Dati in ingresso: Calendario1
     * Operazione: eliminazione appuntamento fittizio 14.30
     * Dati in uscita: calendario e liste appuntamenti intoccati
     */
    public function testDelete_2()
    {
        $factory = new TestCasesFactory();
        $calendario = $factory->createCalendario1();
        $cliente = $calendario->getAppuntamenti()[0]->getCliente();
        $agente = $calendario->getAppuntamenti()[0]->getAgenteImmobiliare();
        $immobile = $calendario->getAppuntamenti()[0]->getImmobile();
        $appuntamento = $factory->createEmptyAppuntamento(14.30);
        $appuntamento = $factory->setAppuntamento($appuntamento, $cliente, $agente, $immobile);
        $calendario->deleteAppuntamento($appuntamento);
        $ok = (sizeof($calendario->getAppuntamenti()) === 1);
        if($ok)
            $ok = (sizeof($agente->getListAppuntamenti()) === 1);
        if($ok)
            $ok = (sizeof($cliente->getListAppuntamenti()) === 1);
        if ($ok)
            $ok = (sizeof($immobile->getListAppuntamenti()) === 1);
        $this->assertTrue($ok);
    }
}
