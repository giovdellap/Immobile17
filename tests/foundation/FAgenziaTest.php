<?php

use PHPUnit\Framework\TestCase;
include (dirname(__FILE__, 3) . '/autoload.php');

class FAgenziaTest extends TestCase
{
    public function testGetAgenzia()
    {
        $agenzia= new MAgenzia();
        $agenzia->setId("AZ1");
        $agenzia->setNome("Immobile17");
        $agenzia->setCitta("L'Aquila");
        $agenzia->setIndirizzo("Via Enrico De Nicola 17");
        $agenzia->setCap("67100");
        $agenzia->setProvincia("AQ");

        $this->assertEquals($agenzia,FAgenzia::getAgenzia("AZ1"));

    }

    public function testModificaAgenzia()
    {
        $agenzia= FAgenzia::getAgenzia("AZ2");
        $agenzia->setNome("PROVASESSANTANOVE420");
        FAgenzia::modificaAgenzia($agenzia);
        $this->assertEquals($agenzia,FAgenzia::getAgenzia("AZ2"));

    }

    public function testAddAgenzia()
    {
        $agenzia=new MAgenzia();
        $agenzia->setNome("PROVA_ADD");
        $agenzia->setProvincia("CH");
        $agenzia->setCitta("CRECCHIO");
        $agenzia->setCap("66026");
        $agenzia->setIndirizzo("via marcodidom 2");
        FAgenzia::addAgenzia($agenzia);
        $agenzia->setId("AZ3");
        $this->assertEquals($agenzia,FAgenzia::getAgenzia("AZ3"));
    }

    public function testBusyWeek()
    {
        $inizio = new MData(2020, 06, 14, 0);
        $fine = new MData(2020, 06, 20, 0);
        $agenzia = FAgenzia::getBusyWeek("IM2", "CL4", $inizio, $fine);

        $cliente = $agenzia->getListClienti()[0];
        echo("ID: ".$cliente->getId()."\n");
        $this->assertEquals(count($cliente->getListAppuntamenti()), 2);

        $immobile = $agenzia->getListImmobili()[0];
        $this->assertEquals(count($immobile->getListAppuntamenti()), 1);

        $this->assertEquals(count($agenzia->getListAgentiImmobiliari()), 2);
    }
}
