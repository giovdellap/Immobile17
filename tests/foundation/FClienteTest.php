<?php

use PHPUnit\Framework\TestCase;
include (dirname(__FILE__, 3) . '/autoload.php');

class FClienteTest extends TestCase
{
    public function testEmailEsistente()
    {
        $this->assertTrue(FUtente::emailesistente("vadoafuoco@hotmail.com"));
    }
    public function testLogin()
    {
        $this->assertTrue(FUtente::login("vadoafuoco@hotmail.com", "campodeifiori"));
    }

    public function testIdEsistente()
    {
        $this->assertTrue(FUtente::idEsistente("CL1"));
    }

    public function testVisualizzaUtente()
    {
        $cliente = FCliente::visualizzaUtente("CL1");
        $valido = true;
        if(strcmp($cliente->getNome(), "Giordano") != 0)
            $valido = false;
        if ($valido == true)
        {
            $dataNascita = new MData(1548, 02, 17, 0);
            if($cliente->getDataNascita() != $dataNascita)
                $valido = false;
        }
        $this->assertTrue($valido);
    }

    public function testRegistrazione()
    {
        $cliente = new MCliente();
        $cliente->setNome("Eustachio");
        $cliente->setCognome("Popovich");
        $cliente->setAttivato(true);
        $cliente->setIscrizione(new MData(2020, 06, 15, 0));
        $cliente->setDataNascita(new MData(1948, 3, 16, 0));
        $cliente->setEmail("facciolapopovich@hotmail.com");
        $cliente->setPassword("CartaIgienica777");
        FCliente::registrazione($cliente);

        $cliente->setId("CL5");
        $this->assertEquals($cliente, FUtente::visualizzaUtente("CL5"));
    }

    public function testModifica()
    {
        $cliente = FUtente::visualizzaUtente("CL5");
        $cliente->setPassword("VasinoDaBambino");
        FUtente::modificaUtente($cliente);
        $this->assertEquals(FUtente::visualizzaUtente("CL5"), $cliente);
    }

    public function testVisualizzaAppUtente()
    {
        $cliente = FUtente::visualizzaAppUtente("CL4");
        $this->assertEquals(count($cliente->getListAppuntamenti()), 2);
    }

    public function testAppUtenteInBetween()
    {
        $inizio = new MData(2020, 06, 14, 0);
        $fine = new MData(2020, 06, 20, 0);
        $cliente = FUtente::AppUtenteInBetween("CL4", $inizio, $fine);
        $this->assertEquals(count($cliente->getListAppuntamenti()), 2);
    }
    //i test sono il mio tachille d'allone    tranqui bro
    public function testIDbyEMail()
    {
        $this->assertEquals(FUtente::loadIDbyEmail("vadoafuoco@hotmail.com"),"CL1");
        echo FUtente::loadIDbyEmail("vadoafuoco@hotmail.com");
    }


}