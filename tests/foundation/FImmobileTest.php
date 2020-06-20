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
    public function testImmobiliHomepage()
    {
        $immobile = FImmobile::getImmobiliHomepage();
        $this->assertEquals($immobile[0]->getId(), 'IM4');
        $this->assertEquals($immobile[1]->getId(), 'IM1');
        $this->assertEquals($immobile[2]->getId(), 'IM6');
    }
    /* questo test funge*/
    public function testVendita()
    {
        $tipo_annuncio = "Vendita";
        $vendita = FImmobile::getTipologia($tipo_annuncio);
        $this->assertEquals($vendita[0]->getId(), 'IM1');
        $this->assertEquals($vendita[1]->getId(), 'IM2');
        $this->assertEquals($vendita[2]->getId(), 'IM4');
        $this->assertEquals($vendita[3]->getId(), 'IM6');
    }


    public function testAffitto()
    {
        $tipo_annuncio = "Affitto";
        $affitto = FImmobile::getTipologia($tipo_annuncio);
        $this->assertEquals($affitto[0]->getId(), 'IM3');
        $this->assertEquals($affitto[1]->getId(), 'IM5');
    }

}