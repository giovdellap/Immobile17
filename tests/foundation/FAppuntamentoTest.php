<?php

use PHPUnit\Framework\TestCase;
include (dirname(__FILE__, 3) . '/autoload.php');

class FAppuntamentoTest extends TestCase
{
    public function testVisualizzaAppOggetto()
    {
        $appuntamenti = FAppuntamento::visualizzaAppOggetto("CL2");
        $this->assertEquals($appuntamenti[0]->getCliente(), FCliente::visualizzaUtente("CL2"));
    }

    public function testAddAppuntamento()
    {
        $appuntamento = new MAppuntamento();
        $appuntamento->setOrarioInizio(new MData(2020, 06, 15, 18.30));
        $appuntamento->setOrarioFine(new MData(2020, 06, 15, 19.00));
        $appuntamento->setCliente(FCliente::visualizzaUtente("CL4"));
        $appuntamento->setAgenteImmobiliare(FUtente::visualizzaUtente("AG1"));
        $appuntamento->setImmobile(FImmobile::getImmobile("IM2"));
        FAppuntamento::addAppuntamento($appuntamento);
        $appuntamento->setId("AP3");
        $this->assertEquals($appuntamento, FAppuntamento::visualizzaAppOggetto("CL4")[0]);
    }

    public function testDeleteAppuntamento()
    {
        $appuntamento = new MAppuntamento();
        $appuntamento->setOrarioInizio(new MData(2020, 06, 16, 15));
        $appuntamento->setOrarioFine(new MData(2020, 06, 16, 15.3));
        $appuntamento->setCliente(FCliente::visualizzaUtente("CL3"));
        $appuntamento->setAgenteImmobiliare(FUtente::visualizzaUtente("AG2"));
        $appuntamento->setImmobile(FImmobile::getImmobile("IM2"));
        FAppuntamento::addAppuntamento($appuntamento);
        if(count(FAppuntamento::visualizzaAppOggetto("CL3")) == 1)
        {
            FAppuntamento::deleteAppuntamento("AP4");
            $this->assertEquals(count(FAppuntamento::visualizzaAppOggetto("CL3")), 0);
        }
        else $this->assertTrue(0);
    }

    public function testGetAppInBetween()
    {
        $appuntamento = new MAppuntamento();
        $appuntamento->setOrarioInizio(new MData(2020, 06, 16, 18.30));
        $appuntamento->setOrarioFine(new MData(2020, 06, 16, 19.00));
        $appuntamento->setCliente(FCliente::visualizzaUtente("CL4"));
        $appuntamento->setAgenteImmobiliare(FUtente::visualizzaUtente("AG1"));
        $appuntamento->setImmobile(FImmobile::getImmobile("IM1"));
        FAppuntamento::addAppuntamento($appuntamento);

        $inizio = new MData(2020, 06, 14, 0);
        $fine = new MData(2020, 06, 20, 0);
        echo ("cacca secca: ". count(FAppuntamento::getAppInBetween("CL4", $inizio, $fine))."\n");
        $this->assertEquals(count(FAppuntamento::getAppInBetween("CL4", $inizio, $fine)), 2);

    }
}