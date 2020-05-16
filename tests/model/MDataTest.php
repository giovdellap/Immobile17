<?php


use PHPUnit\Framework\TestCase;
require (dirname(__FILE__, 3) . '/autoload.php');

class MDataTest extends TestCase
{
    /**
     * Dati in ingresso: 15 maggio
     * Dati da ritornare: giorno == 16
     */
    public function testNextDay_1()
    {
        $data = new MData(2020, 5, 15, 13.30);
        $data->nextDay();
        $this->assertEquals($data->getGiorno(), 16);
    }

    /**
     * Dati in ingresso: 30 aprile
     * Dati da ritornare: 1 maggio
     */
    public function testNextDay_2()
    {
        $data = new MData(2020, 4, 30, 13.30);
        $data->nextDay();
        $this->assertTrue(($data->getGiorno() == 1) && $data->getMese() == 5);
    }

    /**
     * Dati in ingresso: 31/12/2020
     * Dati da ritornare: 1/1/2021
     */
    public function testNetxDay_3()
    {
        $data = new MData(2020, 12, 31, 13.30);
        $data->nextDay();
        $this->assertTrue(($data->getGiorno() == 1) &&
            ($data->getMese() == 1) &&
            ($data->getAnno() == 2021));
    }

    /**
     * Dati in ingresso: 13.30 + 15
     * Dati da ritornare: 13.45
     */
    public function testIncrementoOrario_1()
    {
        $data = new MData(2020, 12, 31, 13.30);
        $data->incrementoOrario(15);
        $this->assertEquals($data->getOrario(), 13.45);
    }

    /**
     * Dati in ingresso: 13.30 + 140
     * Dati da ritornare: 15.50
     */
    public function testIncrementoOrario_2()
    {
        $data = new MData(2020, 12, 31, 13.30);
        $data->incrementoOrario(140);
        $this->assertEquals($data->getOrario(), 15.50);
    }
}
