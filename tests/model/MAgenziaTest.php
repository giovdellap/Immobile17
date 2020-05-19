<?php


use PHPUnit\Framework\TestCase;
include (dirname(__FILE__, 3) . '/autoload.php');
require 'TestCasesFactory.php';

class MAgenziaTest extends TestCase
{
    public function testCheckDisponibilità_1()
    {
        $factory = new TestCasesFactory();
        $agenzia = $factory->createAgenzia();


        $cliente3 = new MCliente();
        $cliente3->setNome("cliente3");
        $agenzia->addCliente($cliente3);

        $immobile = $agenzia->getCalendario()->getAppuntamenti()[0]->getImmobile();
        $inizio = new MData(2020, 5, 15, 8.00);
        $fine = new MData(2020, 5, 15, 11.30);

        $disponibili = $agenzia->checkDisponibilità($cliente3, $immobile, $inizio, $fine);
        echo ("tt: ".sizeof($disponibili));

        echo ("DISPONIBILI:\n\n");
        $factory->showListAppuntamenti($disponibili);

        $this->assertTrue(true);

    }
}
