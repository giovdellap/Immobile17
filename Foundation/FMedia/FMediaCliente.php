<?php


class FMediaCliente extends FObject
{

    private static string $table = "media_cliente";
    private static string $idString = "MC";
    private static string $values="(:id, :nome, :type, :immagine,:id_cliente)";


    public static function bind(PDOStatement $stmt, $obj, string $newId): void
    {


        $stmt->bindValue(':id',$newId, PDO::PARAM_STR);
        $stmt->bindValue(':nome',$obj->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':type',$obj->getType(), PDO::PARAM_STR);
        $stmt->bindValue(':immagine', $obj->getData(), PDO::PARAM_LOB);
        $stmt->bindValue(':id_cliente', $obj->getUtente()->getId(), PDO::PARAM_STR);

    }

    public static function getTable(): string
    {
        return self::$table;
    }

    public static function getValues(): string
    {
        return self::$values;
    }

    public static function getID(): string
    {
        return self::$idString;
    }


    public static function storeMedia(MMediaUtente $mediaUtente):bool
    {
        $db=FDataBase::getInstance();
        return $db->storeDb(self::class,$mediaUtente);

    }

    public static function loadMedia(string $id):?array
    {
        $db=FDataBase::getInstance();
        $db_result= $db->loadDB(self::class,"id_cliente",$id);
        $toReturn=array();
        foreach ($db_result as &$row)
            $toReturn[]=self::unbindMedia($row);
        return $toReturn;
    }

    public static function unbindMedia(array $db_result):MMediaUtente
    {
        $media=new MMediaUtente();
        $media->setId($db_result["id"]);
        $media->setNome($db_result["nome"]);
        $media->setType($db_result["type"]);
        $media->setData($db_result["immagine"]);
        //$media->setUtente(FUtente::getUtente($db_result["id_cliente"]));
        return $media;
    }


    public static function removeMedia(string $id):bool
    {
        $db=FDatabase::getInstance();
        $db->deleteDB(self::class,"id", $id);
    }





}