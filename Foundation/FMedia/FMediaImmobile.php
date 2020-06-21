<?php


class FMediaImmobile extends FObject
{

    private static string $table = "media_immobile";
    private static string $idString = "MI";
    private static string $values="(:id, :nome, :type, :immagine,:id_immobile)";


    public static function bind(PDOStatement $stmt, $obj, string $newId): void
    {

        $path = $_FILES[$obj->getData()]['tmp_name'];
        $file=fopen($path,'rb') or die ("Attenzione! Impossibile da aprire!");
        $stmt->bindValue(':id',$newId, PDO::PARAM_STR);
        $stmt->bindValue(':nome',$obj->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':type',$obj->getType(), PDO::PARAM_STR);
        $stmt->bindValue(':immagine', fread($file,filesize($path)), PDO::PARAM_LOB);
        $stmt->bindValue(':id_immobile', $obj->getUtente()->getId(), PDO::PARAM_STR);
        unset($file);
        unlink($path);
    }

    public static function getTable(): string
    {
        return self::$table;
    }

    public static function getValues(): string
    {
        return self::$values;
    }

    public static function storeMedia(MMediaImmobile $mediaImmobile):bool
    {
        $db=FDataBase::getInstance();
        $db->storeDb(self::class,$mediaImmobile);
    }

    public static function loadMedia(string $id):?array
    {
        $db=FDataBase::getInstance();
        $db_result= $db->loadDB(self::class,"id_immobile",$id);
        $toReturn=array();
        foreach ($db_result as &$row)
            $toReturn[]=self::unbindMedia($row);
        return $toReturn;
    }

    public static function unbindMedia(array $db_result):MMediaImmobile
    {
        $media=new MMediaImmobile();
        $media->setId($db_result["id"]);
        $media->setNome($db_result["nome"]);
        $media->setType($db_result["type"]);
        $media->setData($db_result["immagine"]);
        //$media->setImmobile(FImmobile::getImmobile($db_result["id_immobile"]));
        return $media;
    }


    public static function removeMedia(string $id):bool
    {
        $db=FDatabase::getInstance();
        $db->deleteDB(self::class,"id", $id);
    }



}