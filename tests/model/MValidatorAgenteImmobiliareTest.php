<?php


use PHPUnit\Framework\TestCase;
include (dirname(__FILE__, 3) . '/autoload.php');
require 'TestCasesFactory.php';

class MValidatorAgenteImmobiliareTest extends TestCase
{
    /**
     * Dati in ingresso: Agente1(vuoto), appuntamento 13.30
     * Dati in uscita: true
     */
    public function testAgente_1()
    {
        $factory = new TestCasesFactory();
        $agente = $factory->createAgente1();
        $appuntamento = $factory->createEmptyAppuntamento(13.30);
        $appuntamento->setAgenteImmobiliare($agente);
        $validator = new MValidatorAgenteImmobiliare();
        $this->assertTrue($validator->validate($appuntamento));
    }

    /**
     * Dati in ingresso: Agente2(1 appuntamento 13.30), appuntamento 14.30
     * Dati in uscita: true
     */
    public function testAgente_2()
    {
        $factory = new TestCasesFactory();
        $agente = $factory->createAgente2();
        $appuntamento = $factory->createEmptyAppuntamento(14.30);
        $appuntamento->setAgenteImmobiliare($agente);
        $validator = new MValidatorAgenteImmobiliare();
        $this->assertTrue($validator->validate($appuntamento));
    }

    /**
     * Dati in ingresso: Cliente2(1 appuntamento 13.30), appuntamento 13.30
     * Dati in uscita: false
     */
    public function testAgente_3()
    {
        $factory = new TestCasesFactory();
        $agente = $factory->createAgente2();
        $appuntamento = $factory->createEmptyAppuntamento(13.30);
        $appuntamento->setAgenteImmobiliare($agente);
        $validator = new MValidatorAgenteImmobiliare();
        $this->assertTrue(!$validator->validate($appuntamento));
    }

    /**
     * Dati in ingresso: Cliente2(1 appuntamento 13.30), appuntamento 14.15
     * Dati in uscita: false
     */
    public function testAgente_4()
    {
        $factory = new TestCasesFactory();
        $agente = $factory->createAgente2();
        $appuntamento = $factory->createEmptyAppuntamento(14.15);
        $appuntamento->setAgenteImmobiliare($agente);
        $validator = new MValidatorAgenteImmobiliare();
        $this->assertTrue(!$validator->validate($appuntamento));
    }


}
