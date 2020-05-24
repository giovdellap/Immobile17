<?php


use PHPUnit\Framework\TestCase;
include_once (dirname(__FILE__, 3) . '/autoload.php');
require_once 'TestCasesFactory.php';

class MValidatorImmobileTest extends TestCase
{
    /**
     * Dati in ingresso: Immobile1(vuoto), appuntamento 13.30
     * Dati in uscita: true
     */
    public function testImmobile_1()
    {
        $factory = new TestCasesFactory();
        $immobile = $factory->createImmobile1();
        $appuntamento = $factory->createEmptyAppuntamento(13.30);
        $appuntamento->setImmobile($immobile);
        $validator = new MValidatorImmobile();
        $this->assertTrue($validator->validate($appuntamento));
    }

    /**
     * Dati in ingresso: Immobile2(1 appuntamento 13.30), appuntamento 14.30
     * Dati in uscita: true
     */
    public function testImmobile_2()
    {
        $factory = new TestCasesFactory();
        $immobile = $factory->createImmobile2();
        $appuntamento = $factory->createEmptyAppuntamento(14.30);
        $appuntamento->setImmobile($immobile);
        $validator = new MValidatorImmobile();
        $this->assertTrue($validator->validate($appuntamento));
    }

    /**
     * Dati in ingresso: Cliente2(1 appuntamento 13.30), appuntamento 13.30
     * Dati in uscita: false
     */
    public function testImmobile_3()
    {
        $factory = new TestCasesFactory();
        $immobile = $factory->createImmobile2();
        $appuntamento = $factory->createEmptyAppuntamento(13.30);
        $appuntamento->setImmobile($immobile);
        $validator = new MValidatorImmobile();
        $this->assertTrue(!$validator->validate($appuntamento));
    }

}
