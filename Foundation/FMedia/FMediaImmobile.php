<?php

/**
 * Class FMediaImmobile
 * Si occupa dell'aggiunta, rimozione e caricamento degli oggetti MMediaImmobile dal database
 * @author Della Pelle - Di Domenica - Foderà
 * @package foundation/FMedia
 */
class FMediaImmobile extends FObject
{

    private static string $table = "media_immobile";
    private static string $idString = "MI";
    private static string $values="(:id, :nome, :type, :immagine,:id_immobile)";

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
        $stmt->bindValue(':id_immobile', $obj->getImmobile()->getId(), PDO::PARAM_STR);
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
     * Aggiunge l'MMediaImmobile al db
     * @param MMediaImmobile $mediaImmobile
     * @return bool esito dell'operazione
     */
    public static function storeMedia(MMediaImmobile $mediaImmobile):bool
    {
        $db=FDataBase::getInstance();
        return $db->storeDb(self::class,$mediaImmobile);
    }

    /**
     * Carica un array di MMediaImmobile con l'id immobile passato come parametro dal DB
     * @param string $id
     * @return array|null
     */
    public static function loadMedia(string $id):?array
    {
        $db=FDataBase::getInstance();
        $db_result= $db->loadDB(self::class,"id_immobile",$id);
        $toReturn=array();
        foreach ($db_result as &$row)
            $toReturn[]=self::unbindMedia($row);
        return $toReturn;
    }

    /**
     * Ritorna un MMediaImmobile dall'array ricevuto da FDatabase
     * @param array $db_result
     * @return MMediaImmobile
     */
    public static function unbindMedia(array $db_result):MMediaImmobile
    {
        $media=new MMediaImmobile();
        $media->setId($db_result["id"]);
        $media->setNome($db_result["nome"]);
        $media->setType($db_result["type"]);
        $media->setData($db_result["immagine"]);
        return $media;
    }

    /**
     * Rimuove l'MMediaImmobile con l'id passato come parametro dal database
     * @param string $id
     * @return bool
     */
    public static function removeMedia(string $id):bool
    {
        $db=FDatabase::getInstance();
        $db->deleteDB(self::class,"id", $id);
    }



}