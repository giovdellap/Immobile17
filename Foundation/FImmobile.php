<?php


class FImmobile extends FObject
{   private static string $table="immobile";
    private static string $values="(:id,:CAP,:citta,:indirizzo,:tipologia,:dimensione,
                                    :descrizione,:tipo_annuncio,:attivo,:id_agenzia)";
    private static string $idString;


    public static function bind(PDOStatement $stmt, $obj, string $newId)
    {
        // TODO: Implement bind() method.
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

    public static function addImmobile (MImmobile $immobile){

        $db= FDataBase::getInstance();
        return $db->storeDb(self::class,$immobile);

    }

    public static function getImmobile(string $id)
    {
        $db= FDataBase::getInstance();
        if($db->existDB(self::class,"id",$id)) {
            $db_result = $db->loadDB(self::class, "id", $id);
            if($db_result =! null)
                {
                    $immobile= new MImmobile();
                    $immobile->setId($db_result["id"]);
                    $immobile->setCAP($db_result["CAP"]);
                    $immobile->setComune($db_result["citta"]);
                    $immobile->setIndirizzo($db_result["indirizzo"]);
                    $immobile->setTipologia($db_result["tipologia"]);
                    $immobile->setGrandezza($db_result["dimensione"]);
                    $immobile->setTipoAnnuncio($db_result["tipo_annuncio"]);
                    $immobile->setPrezzo($db_result["prezzo"]);
                    $immobile->setAttivo($db_result["attivo"]);

                    return $immobile;
                }
            else return null;
        }

        else return null;

    }


    public static function getImmobili()
    {
        $db=FDataBase::getInstance();
        $db_result = $db->loadAll(self::class);
        return $db_result;

    }

    public static function disabilita(MImmobile $immobile){

        $db=FDataBase::getInstance();
        return $db->updateDB(self::class,"attivo",false,"id",$immobile->getId());

    }

    public static function modificaImmobile(MImmobile $immobile):bool {

    }

}