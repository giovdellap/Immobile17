<?php


class FAppuntamento extends FObject
{
    private static string $table="appuntamento";
    private static string $values="(:id,:data,:ora_inizio,:ora_fine,:id_cliente,:id_agenteimm,:id_immobile)";
    private static string $id="AP";


    public static function bind(PDOStatement $stmt, $obj, string $newId)
    {
        $stmt->bindValue(':id',$newId,PDO::PARAM_STR);
        $stmt->bindValue(':data',self::getDateString($obj->getOrarioInizio()),PDO::PARAM_STR);
        $stmt->bindValue(':ora_inizio',$obj->getOrario($obj->getOrarioInizio()),PDO::PARAM_STR);
        $stmt->bindValue(':ora_fine',$obj->getOrario($obj->getOrarioFine()),PDO::PARAM_STR);
        $stmt->bindValue(':id_cliente',$obj->getCliente()->getId(),PDO::PARAM_STR);
        $stmt->bindValue(':id_agenteimm',$obj->getAgenteImmobiliare()->getId(),PDO::PARAM_STR);
        $stmt->bindValue(':id_immobile',$obj->getImmobile()->getId(),PDO::PARAM_STR);
    }

    public static function addAppuntamento(MAppuntamento $appuntamento) :bool
    {
        $db= FDataBase::getInstance();
        return $db->storeDb(self::class,$appuntamento);
    }

    public static function deleteAppuntamento(string $id) :bool
    {
        $db= FDataBase::getInstance();
        return $db->deleteDb(self::class,$id);
    }

    public static function unbindAppuntamento(array $db_result) :MAppuntamento
    {
        $appuntamento= new MAppuntamento();
        $appuntamento->setId($db_result["id"]);

        $datainizio=self::getMDataFromString($db_result["data"]);
        $datainizio->setOrario($db_result["ora_inizio"]);
        $appuntamento->setOrarioInizio($datainizio);

        $datafine=self::getMDataFromString($db_result["data"]);
        $datafine->setOrario($db_result["ora_fine"]);
        $appuntamento->setOrarioFine($datafine);

        $appuntamento->setCliente(FCliente::getUtente($db_result["id_cliente"]));
        $appuntamento->setAgenteImmobiliare(FAgenteImmobiliare::getUtente($db_result["id_agenteimm"]));
        $appuntamento->setImmobile(FImmobile::getImmobile($db_result["id_immobile"]));

        return $appuntamento;
    }

    public static function visualizzaAppUtente(string $id): array
    {
        $db= FDataBase::getInstance();
        $to_return=array();
        if(strpos($id, "CL"))
            $row=$db->loadDB(self::class, "id_cliente", $id);

        else
            $row=$db->loadDB(self::class, "id_agenteimm", $id);

        foreach($row as &$item)
        {
            $to_return[]=self::unbindAppuntamento($item);
        }
        return $to_return;
    }
}


