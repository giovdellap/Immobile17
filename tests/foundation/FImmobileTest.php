<?php

use PHPUnit\Framework\TestCase;
include (dirname(__FILE__, 3) . '/autoload.php');

class FImmobileTest extends TestCase
{
    public function testGetImmobili()
    {
        $this->assertEquals(count(FImmobile::getImmobili()),2);
    }

    public function testDisabilita()
    {
        FImmobile::disabilita(FImmobile::getImmobile("IM2"));
        $this->assertTrue(!FImmobile::getImmobile("IM2")->isAttivo());
    }

    public function testModificaImmobile()
    {
        $immobile=FImmobile::getImmobile("IM2");
        echo $immobile->getDescrizione();
        $immobile->setAttivo(true);
        $immobile->setPrezzo(2000);
        FImmobile::modificaImmobile($immobile);
        $this->assertEquals($immobile,FImmobile::getImmobile("IM2"));
    }

    public function testGetAppImmobileInBetween()
    {
        $inizio = new MData(2020, 07, 26, 0);
        $fine = new MData(2020, 07, 31, 0);
        $immobile = FImmobile::getAppImmobileInBetween("IM2", $inizio, $fine);
        $this->assertEquals(count($immobile->getListAppuntamenti()), 1);

    }
}