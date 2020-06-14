<?php

use PHPUnit\Framework\TestCase;
include (dirname(__FILE__, 3) . '/autoload.php');

class FClienteTest extends TestCase
{
    public function testEmailExists()
    {
        $this->assertTrue(FUtente::emailesistente("vadoafuoco@hotmail.com"));
    }
}