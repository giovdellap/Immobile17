<?php


class FAppuntamento extends FObject
{
    private static string $table="appuntamento";
    private static string $values="(:id,:data,:ora_inizio,:ora_fine,:id_cliente,:id_agenteimm,:id_immobile)";
    private static string $id="AP";


    public static function bind(PDOStatement $stmt, $obj, string $newId): void
    {
        $stmt->bindValue(':id',$newId,PDO::PARAM_STR);
        $stmt->bindValue(':data',$obj->getOrarioInizio()->getDateString(),PDO::PARAM_STR);
        $stmt->bindValue(':ora_inizio',$obj->getOrarioInizio()->getOrario(),PDO::PARAM_STR);
        $stmt->bindValue(':ora_fine',$obj->getOrarioFine()->getOrario(),PDO::PARAM_STR);
        $stmt->bindValue(':id_cliente',$obj->getCliente()->getId(),PDO::PARAM_STR);
        $stmt->bindValue(':id_agenteimm',$obj->getAgenteImmobiliare()->getId(),PDO::PARAM_STR);
        $stmt->bindValue(':id_immobile',$obj->getImmobile()->getId(),PDO::PARAM_STR);
    }

    /**
     * @return string
     */
    public static function getTable(): string
    {
        return self::$table;
    }

    /**
     * @return string
     */
    public static function getValues(): string
    {
        return self::$values;
    }

    /**
     * @return string
     */
    public static function getID():string
    {
        return self::$id;
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
        return $db->deleteDb(self::class,"id", $id);
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

        $datainizio=MData::getMDataFromString($db_result["data"]);
        $datainizio->setOrario($db_result["ora_inizio"]);
        $appuntamento->setOrarioInizio($datainizio);

        $datafine=MData::getMDataFromString($db_result["data"]);
        $datafine->setOrario($db_result["ora_fine"]);
        $appuntamento->setOrarioFine($datafine);

        $appuntamento->setCliente(FCliente::visualizzaUtente($db_result["id_cliente"]));
        $appuntamento->setAgenteImmobiliare(FAgenteImmobiliare::visualizzaUtente($db_result["id_agenteimm"]));
        $appuntamento->setImmobile(FImmobile::getImmobile($db_result["id_immobile"]));

        return $appuntamento;
    }

    /**
     * Ritorna la lista appuntamenti dell'oggetto il cui Id viene passato come parametro
     * Riconosce la tipologia di oggetto dal formato dell'Id
     * @param string $id
     * @return array
     */
    public static function visualizzaAppOggetto(string $id): array
    {
        $db= FDataBase::getInstance();
        $to_return=array();
        if(strcmp(self::identifyId($id), "CLIENTE") === 0)
            $row=$db->loadDB(self::class, "id_cliente", $id);
        else if(strcmp(self::identifyId($id), "AGENTE IMMOBILIARE") === 0)
            $row=$db->loadDB(self::class, "id_agenteimm", $id);
        else
            $row=$db->loadDB(self::class, "id_immobile", $id);
        foreach($row as &$item)
           $to_return[]=self::unbindAppuntamento($item);
        return $to_return;
    }

    /**
     * Ritorna la lista appuntamenti dell'oggetto il cui Id viene passato come parametro
     * Riconosce la tipologia di oggetto dal formato dell'Id
     * Gli appuntamenti sono compresi fra le due date
     * @param string $id
     * @param MData $inizio
     * @param MData $fine
     * @return array
     */
    public static function getAppInBetween(string $id, MData $inizio, MData $fine): array
    {
        $datainizio=$inizio->getDateString();
        $datafine=$fine->getDateString();

        $db= FDataBase::getInstance();
        $to_return=array();
        if(strcmp(self::identifyId($id), "CLIENTE") === 0)
            $row=$db->loadAppInBetween(self::class, "id_cliente", $id, $datainizio, $datafine);
        else if(strcmp(self::identifyId($id), "AGENTE IMMOBILIARE") === 0)
            $row=$db->loadAppInBetween(self::class, "id_agenteimm", $id, $datainizio, $datafine);
        else
            $row=$db->loadAppInBetween(self::class, "id_immobile", $id, $datainizio, $datafine);
        foreach($row as &$item)
            $to_return[]=self::unbindAppuntamento($item);
        return $to_return;
    }

    public static function getAppuntamento(string $id)
    {
        $db = FDataBase::getInstance();
        $db_result = $db->loadDB(self::class, "id", $id);
        return self::unbindAppuntamento($db_result[0]);
    }

    public static function getAppuntamenti()
    {
        $db = FDataBase::getInstance();
        $db_result = $db->loadAll(self::class);
        $to_return = [];
        foreach ($db_result as $row)
            $to_return[] = self::unbindAppuntamento($row);
        return $to_return;
    }

    public static function getAppWeek(MData $inizio, MData $fine): array
    {
        $db = FDataBase::getInstance();
        $db_result = $db->loadAppWeek(self::class, $inizio->getDateString(), $fine->getDateString());
        $to_return = [];
        foreach ($db_result as $row)
            $to_return[] = self::unbindAppuntamento($row);
        return $to_return;
    }
}


