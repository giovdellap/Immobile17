<?php


class FAgenzia extends FObject
{
    private static string $table = "agenzia";
    private static string $values= "(:id, :nome, :citta, :CAP, :provincia, :indirizzo)";
    private static string $idString = "AG";


    public static function bind(PDOStatement $stmt, $obj, string $newId): void
    {
        $stmt->bindValue(':id',        $newId, PDO::PARAM_STR);
        $stmt->bindValue(':nome',      $obj->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':citta',     $obj->getCitta(), PDO::PARAM_STR);
        $stmt->bindValue(':CAP',       $obj->getCap(), PDO::PARAM_STR);
        $stmt->bindValue(':provincia', $obj->getProvincia(), PDO::PARAM_STR);
        $stmt->bindValue(':indirizzo', $obj->getIndirizzo(), PDO::PARAM_STR);
    }

    public static function addAgenzia(MAgenzia $agenzia)
    {
        $db= FDataBase::getInstance();
        return $db->storeDb(self::class,$agenzia);
    }

    /**
     * Ritorna un oggetto MAgenzia se l'id esiste, null altrimenti
     * @param string $id
     * @return MAgenzia|null
     */
    public static function getAgenzia(string $id): ?MAgenzia
    {
        $db= FDataBase::getInstance();
        if($db->existDB(self::class,"id",$id)) {
            $db_result = $db->loadDB(self::class, "id", $id);
            if($db_result != null)
            {
                $db_result=$db_result[0];
                $agenzia= new MAgenzia();
                $agenzia->setId($db_result["id"]);
                $agenzia->setCAP($db_result["CAP"]);
                $agenzia->setCitta($db_result["citta"]);
                $agenzia->setIndirizzo($db_result["indirizzo"]);
                $agenzia->setNome($db_result["nome"]);
                $agenzia->setProvincia($db_result["provincia"]);
                if (FMedia::getMedia($agenzia->getId())!= null)
                   $agenzia->setImmagini(FMedia::getMedia($agenzia->getId()));

                return $agenzia;
            }
            else return null;
        }
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
     * Controlla quali argomenti differiscono fra l'MAgenzia passata come parametro e quella presente nel DB
     * Aggiorna il DB con le modifiche
     * @param MAgenzia $agenzia
     * @return bool
     */
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

    /**
     * Ritorna l'Agenzia identificata dall'idagenzia
     * Nell'Agenzia sono presenti il Cliente, l'Immobile e tutti gli agenti Immobiliari
     * Ogni Elemento ha una lista appuntamenti completa di tutti gli appuntamenti compresi fra le due date
     * @param string $idImm
     * @param string $idCliente
     * @param MData $inizio
     * @param MData $fine
     * @return MAgenzia
     */
    public static function getBusyWeek(string $idImm, string $idCliente, MData $inizio, MData $fine): MAgenzia
    {
        $agenzia = new MAgenzia();
        $agenzia->addImmobile(FImmobile::getAppImmobileInBetween($idImm,$inizio,$fine));
        $agenzia->setListAgentiImmobiliari(FAgenteImmobiliare::getAllAgenti($inizio,$fine));
        $agenzia->addCliente(FUtente::AppUtenteInBetween($idCliente,$inizio,$fine));
        return $agenzia;
    }
}
