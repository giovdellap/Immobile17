<?php

/**
 * Class FMediaAgenzia
 * Si occupa dell'aggiunta, rimozione e caricamento degli oggetti MMediaAgenzia dal database
 * @author Della Pelle - Di Domenica - Foderà
 * @package foundation/FMedia
 */
class FMediaAgenzia extends FObject
{

    private static string $table = "media_agenzia";
    private static string $idString = "MZ";
    private static string $values="(:id, :nome, :type, :immagine,:id_agenzia)";

    /**
     * @param PDOStatement $stmt
     * @param oggetto $obj
     * @param string $newId
     */
    public static function bind(PDOStatement $stmt, $obj, string $newId): void
    {

        $path = $_FILES[$obj->getData()]['tmp_name'];
        $file=fopen($path,'rb') or die ("Attenzione! Impossibile da aprire!");
        $stmt->bindValue(':id',$newId, PDO::PARAM_STR);
        $stmt->bindValue(':nome',$obj->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':type',$obj->getType(), PDO::PARAM_STR);
        $stmt->bindValue(':immagine', fread($file,filesize($path)), PDO::PARAM_LOB);
        $stmt->bindValue(':id_agenzia', $obj->getId(), PDO::PARAM_STR);
        unset($file);
        unlink($path);
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
     * Aggiunge l'MMediaAgenzia al db
     * @param MMediaAgenzia $mediaAgenzia
     * @return bool
     */
    public static function storeMedia(MMediaAgenzia $mediaAgenzia):bool
    {
        $db=FDataBase::getInstance();
        $db->storeDb(self::class,$mediaAgenzia);
    }

    /**
     * Carica l'MMediaAgenzia con l'id passato come parametro dal DB
     * @param string $id
     * @return array|null
     */
    public static function loadMedia(string $id):?array
    {
        $db=FDataBase::getInstance();
        $db_result= $db->loadDB(self::class,"id_agenzia",$id);
        $toReturn=array();
        foreach ($db_result as &$row)
            $toReturn[]=self::unbindMedia($row);
        return $toReturn;
    }

    /**
     * Ritorna un MMediaAgenzia dall'array ricevuto da FDatabase
     * @param array $db_result
     * @return MMediaAgenzia
     */
    private static function unbindMedia(array $db_result):MMediaAgenzia
    {
        $media=new MMediaAgenzia();
        $media->setId($db_result["id"]);
        $media->setNome($db_result["nome"]);
        $media->setType($db_result["type"]);
        $media->setData($db_result["immagine"]);
        return $media;
    }

    /**
     * Rimuove l'MMediaAgenzia con l'id passato come parametro dal database
     * @param string $id
     * @return bool
     */
    public static function removeMedia(string $id):bool
    {
        $db=FDatabase::getInstance();
        $db->deleteDB(self::class,"id", $id);
    }

}