<?php

use PHPUnit\Framework\TestCase;
include (dirname(__FILE__, 3) . '/autoload.php');

class FAgenteImmobiliareTest extends TestCase
{
    public function testEmailEsistente()
    {
        $this->assertTrue(FUtente::emailesistente("aldorossi@info.it"));
    }

    public function testLogin()
    {
        $this->assertTrue(FUtente::login("aldorossi@info.it", "pippo"));
    }

    public function testIdEsistente()
    {
        $this->assertTrue(FUtente::idEsistente("AG1"));
    }

    public function testVisualizzaUtente()
    {
        $cliente = FUtente::visualizzaUtente("AG1");
        $valido = true;
        echo($cliente->getNome());
        if(strcmp($cliente->getNome(), "Aldo") != 0)
            $valido = false;
        if ($valido == true)
        {
            $dataNascita = new MData(1975, 12, 25, 0);
            if($cliente->getDataNascita() != $dataNascita)
                $valido = false;
        }
        $this->assertTrue($valido);
    }

    public function testRegistrazione()
    {
        $agente = new MAgenteImmobiliare();
        $agente->setNome("Vanessa");
        $agente->setCognome("Marchesani");
        $agente->setAttivato(true);
        $agente->setIscrizione(new MData(2020, 06, 15, 0));
        $agente->setDataNascita(new MData(1987, 03, 16, 0));
        $agente->setEmail("vanessamarchesani@info.it");
        $agente->setPassword("paperino");
        echo "PENI: " . $agente->getPassword();
        FAgenteImmobiliare::registrazione($agente);
        $agente->setId("AG3");
        $this->assertEquals($agente, FUtente::visualizzaUtente("AG3"));
    }

    public function testModifica()
    {
        $agente = FUtente::visualizzaUtente("AG3");
        $agente->setPassword("pluto");
        FUtente::modificaUtente($agente);
        $this->assertEquals(FUtente::visualizzaUtente("AG3"), $agente);
    }

    public function testVisualizzaAppUtente()
    {
        $agente = FUtente::visualizzaAppUtente("AG1");
        $this->assertEquals(count($agente->getListAppuntamenti()), 3);
    }

    public function testAppUtenteInBetween()
    {
        $inizio = new MData(2020, 06, 14, 0);
        $fine = new MData(2020, 06, 20, 0);
        $agente = FUtente::AppUtenteInBetween("AG1", $inizio, $fine);
        $this->assertEquals(count($agente->getListAppuntamenti()), 2);
    }

    public function testGetAllAgenti()
    {
        $inizio = new MData(2020, 06, 14, 0);
        $fine = new MData(2020, 06, 20, 0);
        $this->assertEquals(count(FAgenteImmobiliare::getAllAgenti($inizio, $fine)), 2);
    }
}