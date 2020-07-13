<?php

/**
 * Class FMediaAgenteImmobiliare
 * Si occupa dell'aggiunta, rimozione e caricamento degli oggetti MMediaAgenteImmobiliare dal database
 * @author Della Pelle - Di Domenica - Foderà
 * @package foundation/FMedia
 */
class FMediaAgenteImmobiliare extends FObject
{
    private static string $table = "media_agenteimm";
    private static string $idString = "MA";
    private static string $values="(:id, :nome, :type, :immagine,:id_agenteimm)";

    /**
     * @param PDOStatement $stmt
     * @param oggetto $obj
     * @param string $newId
     */
    public static function bind(PDOStatement $stmt, $obj, string $newId): void
    {
        $stmt->bindValue(':id',$newId, PDO::PARAM_STR);
        $stmt->bindValue(':nome',$obj->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':type',$obj->getType(), PDO::PARAM_STR);
        $stmt->bindValue(':immagine', $obj->getData(), PDO::PARAM_LOB);
        $stmt->bindValue(':id_agenteimm', $obj->getUtente()->getId(), PDO::PARAM_STR);
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
    public static function getID(): string
    {
        return self::$idString;
    }

    /**
     * Aggiunge l'MMediaUtente al db
     * @param MMediaUtente $mediaUtente
     * @return bool esito dell'operazione
     */
    public static function storeMedia(MMediaUtente $mediaUtente):bool
    {
        $db=FDataBase::getInstance();
        return $db->storeDb(self::class,$mediaUtente);
    }

    /**
     * Carica l'MMediaUtente con l'id agente immobiliare passato come parametro dal DB
     * @param string $id
     * @return array|null
     */
    public static function loadMedia(string $id):?array
    {
        $db=FDataBase::getInstance();
        $db_result= $db->loadDB(self::class,"id_agenteimm",$id);
        $toReturn=array();
        foreach ($db_result as &$row)
            $toReturn[]=self::unbindMedia($row);
        return $toReturn;
    }

    /**
     * Ritorna un MMediaUtente dall'array ricevuto da FDatabase
     * @param array $db_result
     * @return MMediaUtente
     */
    private static function unbindMedia(array $db_result):MMediaUtente
    {
        $media=new MMediaUtente();
        $media->setId($db_result["id"]);
        $media->setNome($db_result["nome"]);
        $media->setType($db_result["type"]);
        $media->setData($db_result["immagine"]);
        return $media;
    }

    /**
     * Rimuove l'MMediaUtente con l'id passato come parametro dal database
     * @param string $id
     * @return bool esito dell'operazione
     */
    public static function removeMedia(string $id):bool
    {
        $db=FDatabase::getInstance();
        $db->deleteDB(self::class,"id", $id);
    }
}