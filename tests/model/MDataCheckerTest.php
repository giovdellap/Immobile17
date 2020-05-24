<?php


use PHPUnit\Framework\TestCase;
include_once (dirname(__FILE__, 3) . '/autoload.php');


class MDataCheckerTest extends TestCase
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
        $toCheckInizio = new MData(2020, 5, 10, 12.45);
        $toCheckFine = new MData(2020, 5, 10, 13.15);
        $dataChecker = new MDataChecker();
        $toReturn = $dataChecker->sovrapposizione($dataInizio, $dataFine, $toCheckInizio, $toCheckFine);
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
        $toCheckInizio = new MData(2020, 5, 10, 11.45);
        $toCheckFine = new MData(2020, 5, 10, 12.15);

        $dataChecker = new MDataChecker();
        $toReturn = $dataChecker->sovrapposizione($dataInizio, $dataFine, $toCheckInizio, $toCheckFine);
        $this->assertEquals($toReturn, false);
    }

    /**
     * Dati in ingresso: orari d'inizio che coincidono
     * Funzione testata: sovrapposizione()
     * Dati da ritornare: true
     */
    public function testSovrapposizioneTrue_2()
    {
        $dataInizio = new MData(2020, 5, 10, 12.30);
        $dataFine = new MData(2020, 5, 10, 13.00);
        $toCheckInizio = new MData(2020, 5, 10, 12.30);
        $toCheckFine = new MData(2020, 5, 10, 13.00);

        $dataChecker = new MDataChecker();
        $toReturn = $dataChecker->sovrapposizione($dataInizio, $dataFine, $toCheckInizio, $toCheckFine);
        $this->assertTrue($toReturn);
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
        $toCheckInizio = new MData(2020, 5, 10, 12.45);
        $toCheckFine = new MData(2020, 5, 10, 13.15);

        $dataChecker = new MDataChecker();
        $toReturn = $dataChecker->sovrapposizioneEstesa($dataInizio, $dataFine, $toCheckInizio, $toCheckFine);
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
        $toCheckInizio = new MData(2020, 5, 10, 10.45);
        $toCheckFine = new MData(2020, 5, 10, 11.15);

        $dataChecker = new MDataChecker();
        $toReturn = $dataChecker->sovrapposizioneEstesa($dataInizio, $dataFine, $toCheckInizio, $toCheckFine);
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
        $toCheckInizio = new MData(2020, 5, 10, 12.15);
        $toCheckFine = new MData(2020, 5, 10, 12.45);

        $dataChecker = new MDataChecker();
        $toReturn = $dataChecker->sovrapposizioneEstesa($dataInizio, $dataFine, $toCheckInizio, $toCheckFine);
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
        $toCheckInizio = new MData(2020, 5, 10, 13.15);
        $toCheckFine = new MData(2020, 5, 10, 13.45);

        $dataChecker = new MDataChecker();
        $toReturn = $dataChecker->sovrapposizioneEstesa($dataInizio, $dataFine, $toCheckInizio, $toCheckFine);
        $this->assertEquals($toReturn, true);
    }

    /**
     * Dati in ingresso: orari d'inizio che si sovrappongono
     * Funzione Testata: sovrapposizioneEstesa()
     * Dati da ritornare: true
     */
    public function testSovrapposizioneEstesa_5()
    {
        $dataInizio = new MData(2020, 5, 10, 12.30);
        $dataFine = new MData(2020, 5, 10, 13.00);
        $toCheckInizio = new MData(2020, 5, 10, 12.30);
        $toCheckFine = new MData(2020, 5, 10, 13.00);

        $dataChecker = new MDataChecker();
        $toReturn = $dataChecker->sovrapposizioneEstesa($dataInizio, $dataFine, $toCheckInizio, $toCheckFine);
        $this->assertEquals($toReturn, true);
    }


}
