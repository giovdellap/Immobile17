<?php

use PHPUnit\Framework\TestCase;
include (dirname(__FILE__, 3) . '/autoload.php');

class FImmobileTest extends TestCase
{
    public function testGetImmobili()
    {
        $this->assertEquals(count(FImmobile::getImmobili()),6);
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

    public function testVendita()
    {
        $field = "tipo_annuncio";
        $type = "Vendita";
        $vendita = FImmobile::getByType($field, $type);
        $this->assertEquals($vendita[0]->getId(), 'IM1');
        $this->assertEquals($vendita[1]->getId(), 'IM2');
        $this->assertEquals($vendita[2]->getId(), 'IM4');
        $this->assertEquals($vendita[3]->getId(), 'IM6');
    }


    public function testAffitto()
    {
        $field = "tipo_annuncio";
        $type = "Affitto";
        $affitto = FImmobile::getByType($field, $type);
        $this->assertEquals($affitto[0]->getId(), 'IM3');
        $this->assertEquals($affitto[1]->getId(), 'IM5');
    }

    public function testMonolocale()
    {
        $field = "tipologia";
        $type = "monolocale";
        $monolocale = FImmobile::getByType($field, $type);
        $this->assertEquals($monolocale[0]->getId(), 'IM1');
        $this->assertEquals($monolocale[1]->getId(), 'IM3');
        $this->assertEquals($monolocale[2]->getId(), 'IM5');
    }

    public function testBilocale()
    {
        $field = "tipologia";
        $type = "bilocale";
        $bilocale = FImmobile::getByType($field, $type);
        $this->assertEquals($bilocale[0]->getId(), 'IM2');
        $this->assertEquals($bilocale[1]->getId(), 'IM4');

    }
    public function testAppartamento()
    {
        $field = "tipologia";
        $type = "appartamento";
        $appartamento = FImmobile::getByType($field, $type);
        $this->assertEquals($appartamento[0]->getId(), 'IM6');

    }

    public function testPrezzo()
    {
        $field = 'prezzo';
        $min = '850';
        $max = '80000';
        $immobile = FImmobile::getByPriceOrSize($field, $min, $max);
        $this->assertEquals($immobile[0]->getId(), 'IM1');
        $this->assertEquals($immobile[1]->getId(), 'IM2');
        $this->assertEquals($immobile[2]->getId(), 'IM3');
        $this->assertEquals($immobile[3]->getId(), 'IM6');
    }

    public function testDimensione()
    {
        $field = 'dimensione';
        $min = '100';
        $max = '500';
        $immobile = FImmobile::getByPriceOrSize($field, $min, $max);
        $this->assertEquals($immobile[0]->getId(), 'IM1');
        $this->assertEquals($immobile[1]->getId(), 'IM3');
        $this->assertEquals($immobile[2]->getId(), 'IM4');
        $this->assertEquals($immobile[3]->getId(), 'IM6');
    }

    public function testKeyword()
    {
        $keyword = 'monica';
        $immobile = FImmobile::getByKeyword($keyword);
        $this->assertEquals($immobile[0]->getId(), 'IM5');
    }

    public function testImmobiliByParameters()
    {
        $parameters = [
            'ti' => 'Vendita',
            'pc' => 'casa',
            'tp' => 'bilocale',
            'gmin' => '100',
            'gmax' => '5000',
            'pmin' => '2000',
            'pmax' => '100000'
        ];
        $immobile = FImmobile::getImmobiliByParameters($parameters);
        $this->assertEquals($immobile[0]->getId(), 'IM2');
        $this->assertEquals($immobile[1]->getId(), 'IM4');


    }
}