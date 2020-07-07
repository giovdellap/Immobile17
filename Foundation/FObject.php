<?php


abstract class FObject
{

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
        $splitted = str_split($id, 1);
        if (strlen($id) <=3)
            $number = $splitted[2] + 1;
        else if (strlen($id)==4){
            $number = $splitted[2]*10 + $splitted[3]+1; echo('peniviolaceitendentialprussiano' . $number );}
        else if (strlen($id)==5)
            $number = $splitted[2]*100 + $splitted[3]*10 + $splitted[4]+1;
        else if (strlen($id)==6)
            echo "Overflow Clients' IDs";
        return $splitted[0] . $splitted[1] . $number;
    }

    /**
     * Identifica unoggetto in base al formato dell'ID
     * @param string $id
     * @return string
     */
    public static function identifyId (string $id):string
    {
        $idString = str_split($id, 2)[0];
        if (strcmp($idString,"CL")===0)
            return "CLIENTE";
        else if(strcmp($idString,"AG")===0)
            return "AGENTE IMMOBILIARE";
        else if(strcmp($idString,"AZ")===0)
            return "AGENZIA";
        else if(strcmp($idString,"IM")===0)
            return "IMMOBILE";
        else if(strcmp($idString,"AM")===0)
            return "AMMINISTRATORE";
        else if(strcmp($idString,"MC")===0)
            return "MEDIA CLIENTE";
        else if(strcmp($idString,"MA")===0)
            return "MEDIA AGENTE";
        else if(strcmp($idString,"MI")===0)
            return "MEDIA IMMOBILE";
        else if(strcmp($idString,"MZ")===0)
            return "MEDIA AGENZIA";
        else return "";
    }
}
