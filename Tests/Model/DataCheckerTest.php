<?php


use PHPUnit\Framework\TestCase;

include "C:\Users\giovd\PhpstormProjects\AgenziaImmobiliare\model\Data.php";
include "C:\Users\giovd\PhpstormProjects\AgenziaImmobiliare\model\Utils\DataChecker.php";

class DataCheckerTest extends TestCase
{
    public function testSovrapposizione()
    {
        $dataInizio = new Data(2020, 5, 10, 12.30);
        $dataFine = new Data(2020, 5, 10, 13.00);
        $toCheck = new Data(2020, 5, 10, 12.45);

        $dataChecker = new DataChecker();
        $toReturn = $dataChecker->sovrapposizione($dataInizio, $dataFine, $toCheck);
        echo $toReturn;
        if($toReturn)
            printf("test ritorna true");
        assert($toReturn);

    }
}
