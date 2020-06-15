<?php

use PHPUnit\Framework\TestCase;
include (dirname(__FILE__, 3) . '/autoload.php');

class FAmministratoreTest extends TestCase
{
    public function testGetAmministratore()
    {
        $amministratore=new MAmministratore();
        $amministratore->setNome("Admin");
        $amministratore->setCognome("Istrator");
        $amministratore->setId("AM1");
        $amministratore->setMail("admin@admin.it");
        $amministratore->setPassword("Ciro");
        $this->assertEquals($amministratore, FAmministratore::getAmministratore("AM1"));

    }

    public function testModificaAmministratore()
    {
        $amministratore=FAmministratore::getAmministratore("AM1");
        $amministratore->setPassword("Ciro");
        FAmministratore::modificaAmministratore($amministratore);
        $this->assertEquals($amministratore,FAmministratore::getAmministratore("AM1"));
    }

    public function testLoginAmministratore()
    {
        $this->assertTrue(FAmministratore::login("admin@admin.it","Ciro"));
    }

    public function testEmailEsistente()
    {
        $this->assertTrue(FAmministratore::emailEsistente("admin@admin.it"));
    }
}