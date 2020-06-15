<?php


class FImmobile extends FObject
{
    private static string $table="immobile";
    private static string $values="(:id,:CAP,:citta,:indirizzo,:tipologia,:dimensione,
                                    :descrizione,:tipo_annuncio,:attivo)";
    private static string $idString = "IM";


    public static function bind(PDOStatement $stmt, $obj, string $newId): void
    {
        $stmt->bindValue(':id',$newId,PDO::PARAM_STR);
        $stmt->bindValue(':CAP',$obj->getCAP(),PDO::PARAM_STR);
        $stmt->bindValue(':citta',$obj->getComune(),PDO::PARAM_STR);
        $stmt->bindValue(':indirizzo',$obj->getIndirizzo(),PDO::PARAM_STR);
        $stmt->bindValue(':tipologia',$obj->getTipologia(),PDO::PARAM_STR);
        $stmt->bindValue(':dimensione',$obj->getGrandezza(),PDO::PARAM_STR);
        $stmt->bindValue(':descrizione',$obj->getDescrizione(),PDO::PARAM_STR);
        $stmt->bindValue(':tipo_annuncio',$obj->getTipoAnnuncio(),PDO::PARAM_STR);
        $stmt->bindValue(':attivo',$obj->getAttivo(),PDO::PARAM_STR);
        $stmt->bindValue(':prezzo',$obj->getPrezzo(),PDO::PARAM_STR);

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
     * Aggiunge l'MImmobile passato come parametro al DB
     * @param MImmobile $immobile
     * @return bool esito dell'operazione
     */
    public static function addImmobile (MImmobile $immobile) :bool
    {
        $db= FDataBase::getInstance();
        return $db->storeDb(self::class,$immobile);
    }

    /**
     * Ritorna l'Immobile con l'Id passato come paramentro se esiste, null altrimenti
     * @param string $id
     * @return MImmobile|null
     */
    public static function getImmobile(string $id)
    {
        $db= FDataBase::getInstance();
        if($db->existDB(self::class,"id",$id)) {
            $db_result = $db->loadDB(self::class, "id", $id);
            if($db_result != null)
                return self::unBindImmobile($db_result[0]);
            else return null;
        }
        else return null;

    }

    /**
     * Ritorna un MImmobile dall'array di attributi $db_result
     * @param array $db_result
     * @return MImmobile
     */
    public static function unBindImmobile(array $db_result): MImmobile
    {
        $immobile= new MImmobile();
        $immobile->setId($db_result["id"]);
        $immobile->setCAP($db_result["CAP"]);
        $immobile->setComune($db_result["citta"]);
        $immobile->setIndirizzo($db_result["indirizzo"]);
        $immobile->setTipologia($db_result["tipologia"]);
        $immobile->setDescrizione($db_result["descrizione"]);
        $immobile->setGrandezza($db_result["dimensione"]);
        $immobile->setTipoAnnuncio($db_result["tipo_annuncio"]);
        $immobile->setPrezzo($db_result["prezzo"]);
        $immobile->setAttivo($db_result["attivo"]);
        if (FMedia::getMedia($immobile->getId())!=null)
             $immobile->setImmagini(FMedia::getMedia($immobile->getId()));

        return $immobile;
    }

    /**
     * Ritorna tutti gli immobili presenti nel DB
     * @return array
     */
    public static function getImmobili()
    {
        $db=FDataBase::getInstance();
        $db_result = $db->loadAll(self::class);
        $immobili = array();
        foreach ($db_result as &$item)
            $immobili[] = self::unBindImmobile($item);
        return $immobili;
    }

    /**
     * Disabilita l'Immobile passato come parametro
     * @param MImmobile $immobile
     * @return bool esito dell'operazione
     */
    public static function disabilita(MImmobile $immobile): bool
    {
        $db=FDataBase::getInstance();
        return $db->updateDB(self::class,"attivo",false,"id",$immobile->getId());
    }

    /**
     * Confronta l'Immobile passato come parametro con quello presente nel DB
     * Aggiorna il DB con i campi aggiornati del nuovo Immobile
     * @param MImmobile $immobile
     * @return bool esito dell'operazione
     */
    public static function modificaImmobile(MImmobile $immobile):bool
    {
        $db = FDataBase::getInstance();
        if($db->existDB(self::class, "id", $immobile->getId())) {

            $oldImmobile = self::getImmobile($immobile->getId());
            $mods = array();

            if ($oldImmobile->getIndirizzo() != $immobile->getIndirizzo())
                $mods["indirizzo"] = $immobile->getIndirizzo();
            if ($oldImmobile->getCAP() != $immobile->getCAP())
                $mods["CAP"] = $immobile->getCAP();
            if ($oldImmobile->getComune() != $immobile->getComune())
                $mods["comune"] = $immobile->getComune();
            if ($oldImmobile->getTipologia() != $immobile->getTipologia())
                $mods["tipologia"] = $immobile->getTipologia();
            if ($oldImmobile->getTipoAnnuncio() != $immobile->getTipoAnnuncio())
                $mods["tipo_annuncio"] = $immobile->getTipoAnnuncio();
            if ($oldImmobile->getGrandezza() != $immobile->getGrandezza())
                $mods["dimensione"] = $immobile->getGrandezza();
            if ($oldImmobile->getPrezzo() != $immobile->getPrezzo())
                $mods["prezzo"] = $immobile->getPrezzo();
            echo ("Immobile: " . $immobile->getDescrizione() . "\n" );
            echo ("OLDimmobile: " . $oldImmobile->getDescrizione() . "\n");
            if ($oldImmobile->getDescrizione() != $immobile->getDescrizione())
                $mods["descrizione"] = $immobile->getDescrizione();
            if ($oldImmobile->isAttivo() != $immobile->isAttivo())
                $mods["attivo"] = $immobile->isAttivo();

            foreach (array_keys($mods) as $key)
            {
                $toReturn = $db->updateDB(self::class, $key, $mods[$key], "id", $immobile->getId());
                if(!$toReturn)
                    return false;
            }
            return true;

        }
        else return false;

    }

    /**
     * Ritorna l'Immobile in questione con la lista appuntamenti contenente gli appuntamenti compresi fra le due date
     * @param string $id
     * @param MData $inizio
     * @param MData $fine
     * @return MImmobile|null
     */
    public static function getAppImmobileInBetween(string $id, MData $inizio, MData $fine): ?MImmobile
    {
        $immobile = self::getImmobile($id);
        $immobile->setListAppuntamenti(FAppuntamento::getAppInBetween($id,$inizio,$fine));
        return $immobile;
    }
}