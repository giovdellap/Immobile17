<?php


class FAmministratore
{
    private static string $table= "amministatore";
    private static string $idString= "AD";
    private static string $values="(:id, :nome, :cognome, :password, :id_agenzia)";


    public static function bind(PDOStatement $stmt, $obj, string $newId)
    {
        $stmt->bindValue(':id', $newId, PDO::PARAM_STR);
        $stmt->bindValue(':nome', $obj->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':cognome', $obj->getCognome(), PDO::PARAM_STR);
        $stmt->bindValue(':mail', $obj->getMail(), PDO::PARAM_STR);
        $stmt->bindValue(':password', $obj->getPassword(), PDO::PARAM_STR);
        $stmt->bindValue(':id_agenzia',$obj->getAgenzia()->getId(),PDO::PARAM_STR);
    }
    public static function getAmministratore(string $id)
    {
        $db= FDataBase::getInstance();
        if($db->existDB(self::class,"id",$id)) {
            $db_result = $db->loadDB(self::class, "id", $id);
            if($db_result =! null)
            {
                $amministratore= new MAmministratore();
                $amministratore->setId($db_result["id"]);
                $amministratore->setNome($db_result["nome"]);
                $amministratore->setCognome($db_result["cognome"]);
                $amministratore->setMail($db_result["mail"]);
                $amministratore->setPassword($db_result["password"]);

                return $amministratore;
            }
            else return null;
        }

        else return null;
    }

    public static function modificaAmministratore(MAmministratore $amministratore):bool
    {
        $db = FDataBase::getInstance();
        if($db->existDB(self::class, "id", $amministratore->getId())) {

            $oldAmministratore= self::getAmministratore($amministratore->getId());
            $mods = array();

            if ($oldAmministratore->getNome() != $amministratore->getNome())
                $mods["nome"] = $amministratore->getNome();
            if ($oldAmministratore->getCognome() != $amministratore->getCognome())
                $mods["cognome"] = $amministratore->getCognome();
            if ($oldAmministratore->getMail() != $amministratore->getMail())
                $mods["mail"] = $amministratore->getMail();
            if ($oldAmministratore->getPassword() != $amministratore->getPassword())
                $mods["password"] = $amministratore->getPassword();

            foreach (array_keys($mods) as &$key)
            {
                $toReturn = $db->updateDB(self::class, $key, $mods[$key], "id", $amministratore->getId());
                if(!$toReturn)
                    return false;
            }
            return true;
        }
        else return false;
    }

    public static function login(string $mail, string $password): bool
    {
        $db = FDataBase::getInstance();
        return $db->login(self::class, $mail, $password);
    }

    public static function emailEsistente(string $mail): bool
    {
        $db=FDataBase::getInstance();
        return $db->existDB(self::class, "mail", $mail);

    }
}

