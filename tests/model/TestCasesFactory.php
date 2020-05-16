<?php

//require (dirname(__FILE__, 3) . '/autoload.php');

class TestCasesFactory
{
    public function createCliente1(): MCliente
    {
        return new MCliente();
    }

    public function createCliente2(): MCliente
    {
        $cliente = new MCliente();
        $appuntamento_1 = $this->createEmptyAppuntamento(13.30);
        $cliente->addAppuntamento($appuntamento_1);
        return $cliente;
    }

    public function createEmptyAppuntamento(float $orario): MAppuntamento
    {
        $appuntamento = new MAppuntamento(1);
        $inizio = new MData(2020, 5, 15, $orario);
        $appuntamento->setOrarioInizio($inizio);
        $fine = $inizio;
        $fine->incrementoOrario(30);
        $appuntamento->setOrarioFine($fine);
        return $appuntamento;
    }

}