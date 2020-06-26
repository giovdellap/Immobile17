<?php

use PHPUnit\Framework\TestCase;
include_once (dirname(__FILE__, 3) . '/autoload.php');

class MImmobileTest extends TestCase
{
    public function testDescrizioneBreve1()
    {
        $immobile = new MImmobile();
        $descrizione = "L'immobile di pino";
        $immobile->setDescrizione($descrizione);
        echo ("descrBreve: ".$immobile->getDescrizioneBreve()."fine");
        $this->assertEquals(strlen($immobile->getDescrizioneBreve()), 85);
    }

    public function testDescrizioneBreve2()
    {
        $immobile = new MImmobile();
        $descrizione = "Pronto, pronto sì, ssss sì ssì sssss stiamo, siam... sìsìsì no, è... la la lascia lasciami... è m mma maria nnn... noo... ss, bè, ss se fosse stato per me... sì... ma io ss sono il primo che che... non ho ca, non ho ca, non ho c... non ho c... [urlando stressato] Allora, mi lasci parlare o no?! Hai capito?! E non ne posso più di ascoltarti, stai parlando solo tu! E mi hai proprio rotto i coglioni, mi hai rotto i coglioni, hai capito?! Perché non sono un automa, sono una persona, e a un certo punto te lo devo proprio dire: vaffanculo! Vaffanculo!! V, A, F, F, 'ncuuuulo!!! Tu, il tuo negozio, la tua villa di merda, mi fai schifo, strooonzoo!!";
        $immobile->setDescrizione($descrizione);
        echo ("descrBreve: ".$immobile->getDescrizioneBreve()."fine");
        $this->assertEquals(strlen($immobile->getDescrizioneBreve()), 85);
    }
}