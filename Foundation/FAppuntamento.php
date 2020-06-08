<?php


class FAppuntamento extends FObject
{
    private static string $table="appuntamento";
    private static string $values="(:id,:data,:ora_inizio,:ora_fine,:id_cliente,:id_agenteimm,:id_immobile)";
    private static string $id="AP";


    public static function bind(PDOStatement $stmt, $obj, string $newId): void
    {
        $stmt->bindValue(':id',$newId,PDO::PARAM_STR);
        $stmt->bindValue(':data',self::getDateString($obj->getOrarioInizio()),PDO::PARAM_STR);
        $stmt->bindValue(':ora_inizio',$obj->getOrario($obj->getOrarioInizio()),PDO::PARAM_STR);
        $stmt->bindValue(':ora_fine',$obj->getOrario($obj->getOrarioFine()),PDO::PARAM_STR);
        $stmt->bindValue(':id_cliente',$obj->getCliente()->getId(),PDO::PARAM_STR);
        $stmt->bindValue(':id_agenteimm',$obj->getAgenteImmobiliare()->getId(),PDO::PARAM_STR);
        $stmt->bindValue(':id_immobile',$obj->getImmobile()->getId(),PDO::PARAM_STR);
    }

    /**
     * Aggiunge l'Appuntamento passato come parametro al DB
     * @param MAppuntamento $appuntamento
     * @return bool
     */
    public static function addAppuntamento(MAppuntamento $appuntamento) :bool
    {
        $db= FDataBase::getInstance();
        return $db->storeDb(self::class,$appuntamento);
    }

    /**
     * Elimina l'Appuntamento dal DB
     * @param string $id
     * @return bool
     */
    public static function deleteAppuntamento(string $id) :bool
    {
        $db= FDataBase::getInstance();
        return $db->deleteDb(self::class,$id);
    }

    /**
     * Ritorna un MAppuntamento dall'array di attributi $db_result
     * @param array $db_result
     * @return MAppuntamento
     */
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

    /**
     * Ritorna la lista appuntamenti  dell'oggeto il cui Id viene passato come parametro
     * Riconosce la tipologia di oggetto dal formato dell'Id
     * @param string $id
     * @return array
     */
    public static function visualizzaAppOggetto(string $id): array
    {
        $db= FDataBase::getInstance();
        $to_return=array();
        if(strpos($id, "CL"))
            $row=$db->loadDB(self::class, "id_cliente", $id);
        if(strpos($id, "AG"))
            $row=$db->loadDB(self::class, "id_agenteimm", $id);
        else
            $row=$db->loadDB(self::class, "id_immobile", $id);
        foreach($row as &$item)
           $to_return[]=self::unbindAppuntamento($item);
        return $to_return;
    }

    public static function getAppInBetween(string $id, MData $inizio, MData $fine): array
    {
        $datainizio=self::getDateString($inizio);
        $datafine=self::getDateString($fine);

        $db= FDataBase::getInstance();
        $to_return=array();
        if(strpos($id, "CL"))
            $row=$db->loadAppInBetween(self::class, "id_cliente", $id, $datainizio, $datafine);
        if(strpos($id, "AG"))
            $row=$db->loadAppInBetween(self::class, "id_agenteimm", $id, $datainizio, $datafine);
        else
            $row=$db->loadAppInBetween(self::class, "id_immobile", $id, $datainizio, $datafine);
        foreach($row as &$item)
            $to_return[]=self::unbindAppuntamento($item);
        return $to_return;
    }
}


