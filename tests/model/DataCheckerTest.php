<?php


use PHPUnit\Framework\TestCase;
require (dirname(__FILE__, 3) . '/autoload.php');



class DataCheckerTest extends TestCase
{
    /**
     * Dati in ingresso: orari che si sovrappongono
     * Funzione testata: sovrapposizione()
     * Dati da ritornare: true
     */
    public function testSovrapposizioneTrue()
    {
        $dataInizio = new MData(2020, 5, 10, 12.30);
        $dataFine = new MData(2020, 5, 10, 13.00);
        $toCheck = new MData(2020, 5, 10, 12.45);

        $dataChecker = new MDataChecker();
        $toReturn = $dataChecker->sovrapposizione($dataInizio, $dataFine, $toCheck);
        $this->assertEquals($toReturn, true);

    }

    /**
     * Dati in ingresso: orari che non si sovrappongono
     * Funzione testata: sovrapposizione()
     * Dati da ritornare: false
     */
    public function testSovrapposizioneFalse()
    {
        $dataInizio = new MData(2020, 5, 10, 12.30);
        $dataFine = new MData(2020, 5, 10, 13.00);
        $toCheck = new MData(2020, 5, 10, 11.45);

        $dataChecker = new MDataChecker();
        $toReturn = $dataChecker->sovrapposizione($dataInizio, $dataFine, $toCheck);
        $this->assertEquals($toReturn, false);
    }

    /**
     * Dati in ingresso: orari che si sovrappongono
     * Funzione Testata: sovrapposizioneEstesa()
     * Dati da ritornare: true
     */
    public function testSovrapposizioneEstesa_1()
    {
        $dataInizio = new MData(2020, 5, 10, 12.30);
        $dataFine = new MData(2020, 5, 10, 13.00);
        $toCheck = new MData(2020, 5, 10, 12.45);

        $dataChecker = new MDataChecker();
        $toReturn = $dataChecker->sovrapposizioneEstesa($dataInizio, $dataFine, $toCheck);
        $this->assertEquals($toReturn, true);
    }

    /**
     * Dati in ingresso: orari che non si sovrappongono
     * Funzione testata: sovrapposizioneEstesa()
     * Dati da ritornare: false
     */
    public function testSovrapposizoneEstesa_2()
    {
        $dataInizio = new MData(2020, 5, 10, 12.30);
        $dataFine = new MData(2020, 5, 10, 13.00);
        $toCheck = new MData(2020, 5, 10, 10.45);

        $dataChecker = new MDataChecker();
        $toReturn = $dataChecker->sovrapposizioneEstesa($dataInizio, $dataFine, $toCheck);
        $this->assertEquals($toReturn, false);
    }

    /**
     * Dati in ingresso: orari che si sovrappongono estesamente prima
     * Funzione testata: sovrapposizioneEstesa()
     * Dati da ritornare: true
     */
    public function testSovrapposizioneEstesa_3()
    {
        $dataInizio = new MData(2020, 5, 10, 12.30);
        $dataFine = new MData(2020, 5, 10, 13.00);
        $toCheck = new MData(2020, 5, 10, 12.15);

        $dataChecker = new MDataChecker();
        $toReturn = $dataChecker->sovrapposizioneEstesa($dataInizio, $dataFine, $toCheck);
        $this->assertEquals($toReturn, true);
    }

    /**
     * Dati in ingresso: orari che si sovrappongono estesamente dopo
     * Funzione testata: sovrapposizioneEstesa()
     * Dati da ritornare: true
     */
    public function testSovrapposizioneEstesa_4()
    {
        $dataInizio = new MData(2020, 5, 10, 12.30);
        $dataFine = new MData(2020, 5, 10, 13.00);
        $toCheck = new MData(2020, 5, 10, 13.15);

        $dataChecker = new MDataChecker();
        $toReturn = $dataChecker->sovrapposizioneEstesa($dataInizio, $dataFine, $toCheck);
        $this->assertEquals($toReturn, true);
    }


}
