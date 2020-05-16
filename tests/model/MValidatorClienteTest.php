<?php


use PHPUnit\Framework\TestCase;
include (dirname(__FILE__, 3) . '/autoload.php');
require 'TestCasesFactory.php';


class MValidatorClienteTest extends TestCase
{
    /**
     * Dati in ingresso: Cliente1(vuoto), appuntamento 13.30
     * Dati in uscita: true
     */
    public function testCliente_1()
    {
        $factory = new TestCasesFactory();
        $cliente = $factory->createCliente1();
        $appuntamento = $factory->createEmptyAppuntamento(13.30);
        $appuntamento->setCliente($cliente);
        $validator = new MValidatorCliente();
        $this->assertTrue($validator->validate($appuntamento));
    }

    /**
     * Dati in ingresso: Cliente2(1 appuntamento 13.30), appuntamento 14.30
     * Dati in uscita: true
     */
    public function testCliente_2()
    {
        $factory = new TestCasesFactory();
        $cliente = $factory->createCliente2();
        $appuntamento = $factory->createEmptyAppuntamento(14.30);
        $appuntamento->setCliente($cliente);
        $validator = new MValidatorCliente();
        $this->assertTrue($validator->validate($appuntamento));
    }

    /**
     * Dati in ingresso: Cliente2(1 appuntamento 13.30), appuntamento 13.30
     * Dati in uscita: false
     */
    public function testCliente_3()
    {
        $factory = new TestCasesFactory();
        $cliente = $factory->createCliente2();
        $appuntamento = $factory->createEmptyAppuntamento(13.30);
        $appuntamento->setCliente($cliente);
        $validator = new MValidatorCliente();
        $this->assertTrue(!$validator->validate($appuntamento));
    }

    /**
     * Dati in ingresso: Cliente2(1 appuntamento 13.30), appuntamento 14.15
     * Dati in uscita: false
     */
    public function testCliente_4()
    {
        $factory = new TestCasesFactory();
        $cliente = $factory->createCliente2();
        $appuntamento = $factory->createEmptyAppuntamento(14.15);
        $appuntamento->setCliente($cliente);
        $validator = new MValidatorCliente();
        $this->assertTrue(!$validator->validate($appuntamento));
    }
}
