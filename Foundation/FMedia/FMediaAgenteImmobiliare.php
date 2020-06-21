<?php


class FMediaAgenteImmobiliare extends FObject
{
    private static string $table = "media_agenteimm";
    private static string $idString = "MA";
    private static string $values="(:id, :nome, :type, :immagine,:id_agenteimm)";


    public static function bind(PDOStatement $stmt, $obj, string $newId): void
    {

        $path = $_FILES[$obj->getData()]['tmp_name'];
        $file=fopen($path,'rb') or die ("Attenzione! Impossibile da aprire!");
        $stmt->bindValue(':id',$newId, PDO::PARAM_STR);
        $stmt->bindValue(':nome',$obj->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':type',$obj->getType(), PDO::PARAM_STR);
        $stmt->bindValue(':immagine', fread($file,filesize($path)), PDO::PARAM_LOB);
        $stmt->bindValue(':id_agenteimm', $obj->getUtente()->getId(), PDO::PARAM_STR);
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


    public static function storeMedia(MMediaUtente $mediaUtente):bool
    {
        $db=FDataBase::getInstance();
        $db->storeDb(self::class,$mediaUtente);
    }

    public static function loadMedia(string $id):?array
    {
        $db=FDataBase::getInstance();
        $db_result= $db->loadDB(self::class,"id_agenteimm",$id);
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
        //$media->setUtente(FUtente::getUtente($db_result["id_agenteimm"]));
        return $media;
    }

    public static function removeMedia(string $id):bool
    {
        $db=FDatabase::getInstance();
        $db->deleteDB(self::class,"id", $id);
    }
}