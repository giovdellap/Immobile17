<?php


class FAgenzia extends FObject
{
    private static string $table = "agenzia";
    private static string $values= "(:id, :nome, :citta, :CAP, :provincia, :indirizzo)";
    private static string $idString = "AG";

    public static function bind(PDOStatement $stmt, $obj, string $newId)
    {
        $stmt->bindValue(':id',        $newId, PDO::PARAM_STR);
        $stmt->bindValue(':nome',      $obj->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':citta',     $obj->getCitta(), PDO::PARAM_STR);
        $stmt->bindValue(':CAP',       $obj->getCap(), PDO::PARAM_STR);
        $stmt->bindValue(':provincia', $obj->getProvincia(), PDO::PARAM_STR);
        $stmt->bindValue(':indirizzo', $obj->getIndirizzo(), PDO::PARAM_STR);
    }

    public static function getAgenzia(string $id)
    {
        $db= FDataBase::getInstance();
        if($db->existDB(self::class,"id",$id)) {
            $db_result = $db->loadDB(self::class, "id", $id);
            if($db_result =! null)
            {
                $agenzia= new MAgenzia();
                $agenzia->setId($db_result["id"]);
                $agenzia->setCAP($db_result["CAP"]);
                $agenzia->setCitta($db_result["citta"]);
                $agenzia->setIndirizzo($db_result["indirizzo"]);
                $agenzia->setNome($db_result["nome"]);
                $agenzia->setProvincia($db_result["provincia"]);

                return $agenzia;
            }
            else return null;
        }
    }

    public static function getImmobili(string $id): MAgenzia
    {
        $agenzia = self::getAgenzia($id);
        $agenzia->setListImmobili(FImmobile::getImmobili());
        return $agenzia;
    }

    public static function modificaAgenzia(MAgenzia $agenzia):bool{

        $db = FDataBase::getInstance();
        if($db->existDB(self::class, "id", $agenzia->getId()))
        {

            $oldagenzia = self::getAgenzia($agenzia->getId());
            $mods = array();

            if ($oldagenzia->getCAP() != $agenzia->getCAP())
                $mods["CAP"] = $agenzia->getCAP();
            if ($oldagenzia->getCitta() != $agenzia->getCitta())
                $mods["citta"] = $agenzia->getCitta();
            if ($oldagenzia->getIndirizzo() != $agenzia->getIndirizzo())
                $mods["indirizzo"] = $agenzia->getIndirizzo();


            if ($oldagenzia->getNome() != $agenzia->getNome())
                $mods["nome"] = $agenzia->getNome();
            if ($oldagenzia->getProvincia() != $agenzia->getProvincia())
                $mods["provincia"] = $agenzia->getProvincia();

            foreach (array_keys($mods) as $key)
            {
                $toReturn = $db->updateDB(self::class, $key, $mods[$key], "id", $agenzia->getId());
                if(!$toReturn)
                    return false;
            }
                return true;
        }
        else return false;

    }

    public static function getBusyWeek(string $idImm, string $idCliente, MData $inizio, MData $fine)
    {

        //TO DO

    }
}
