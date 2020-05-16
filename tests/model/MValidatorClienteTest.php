<?php


use PHPUnit\Framework\TestCase;
include (dirname(__FILE__, 3) . '/autoload.php');
require 'TestCasesFactory.php';


class MValidatorClienteTest extends TestCase
{
    public function testCliente_1()
    {
        $factory = new TestCasesFactory();
        $cliente = $factory->createCliente1();
        $appuntamento = $factory->createEmptyAppuntamento(13.30);
        $appuntamento->setCliente($cliente);
        $validator = new MValidatorCliente();
        $this->assertTrue($validator->validate($appuntamento));

    }
}
