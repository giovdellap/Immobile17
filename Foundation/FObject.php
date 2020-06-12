<?php


abstract class FObject
{   private static string $table="table";
    private static string $values = "values";
    private static string $idString = "id";

    /**
     * Efettua il bind degli attributi di $obj (Oggetto del model) nello statement PDO
     * @param PDOStatement $stmt
     * @param $obj oggetto del Model
     * @param string $newId Id ottenuto dal DB incrementando l'ultimo Id presente nella table
     * @return void
     */
    public static abstract function bind(PDOStatement $stmt, $obj, string $newId): void;


    /**
     * Incrementa $id di 1
     * @param string $id Id ottenuto dal DB
     * @return string
     */
    public static function calculateNewID(string $id): string
    {
        echo("ID: ".$id);
        $splitted = str_split($id, 1);
        if (strlen($id) <=3) {

            $number = $splitted[2] + 1;

        }
        else if (strlen($id)==4)
        {
            $number = $splitted[2]*10 + $splitted[3]+1;
        }
        else if (strlen($id)==5)
        {
            $number = $splitted[2]*100 + $splitted[3]*10 + $splitted[4]+1;
        }
        else if (strlen($id)==6)
            echo "Overflow Clients' IDs";
        return $splitted[0] . $splitted[1] . $number;


    }

    /**
     * Converte un oggetto MData in una data in formato YYYY-mm-dd
     * @param MData $data
     * @return string
     */
    public static function getDateString(MData $data): string
    {
        return $data->getAnno() . "-" . $data->getMese() . "-" . $data->getGiorno();
    }

    /**
     * Converte una stringa data in formato YYYY--mm--dd in un MData
     * @param string $str
     * @return MData
     */
    public static function getMDataFromString(string $str): MData
    {
        $data = new MData();
        list($anno, $mese, $giorno) = explode("-", $str);
        $data->setAnno($anno);
        $data->setMese($mese);
        $data->setGiorno($giorno);
        return $data;
    }
}
