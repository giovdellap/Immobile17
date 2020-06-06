<?php


class FMediaImmobile extends FMedia
{
    public static function bind($stmt,$md,$nome_file)

    {
        $path = $_FILES[$nome_file]['tmp_name'];
        $file=fopen($path,'rb') or die ("Attenzione! Impossibile da aprire!"); // 'rb' si usa per file non di testo
        $stmt->bindValue(':id',NULL, PDO::PARAM_INT); //l'id � posto a NULL poich� viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':nome',$md->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':type',$md->getType(), PDO::PARAM_STR);
        $stmt->bindValue(':immagine', fread($file,filesize($path)), PDO::PARAM_LOB);
    }

    public static function getMediaImmobile(string $id)
    {
        $db= FDataBase::getInstance();
        $to_return=array();
        $row=$db->loadDB(self::class, "id_immobile", $id);

        foreach($row as &$item)
        {
            $to_return[]=self::unbindMedia($item); //forse? se è come getAppUtente dovrebbe
        }
        return $to_return;
    }



}