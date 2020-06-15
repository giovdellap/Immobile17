<?php


class FAmministratore
{
    private static string $table= "amministratore";
    private static string $idString= "AD";
    private static string $values="(:id, :nome, :cognome, :password)";


    public static function bind(PDOStatement $stmt, $obj, string $newId): void
    {
        $stmt->bindValue(':id', $newId, PDO::PARAM_STR);
        $stmt->bindValue(':nome', $obj->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':cognome', $obj->getCognome(), PDO::PARAM_STR);
        $stmt->bindValue(':mail', $obj->getMail(), PDO::PARAM_STR);
        $stmt->bindValue(':password', $obj->getPassword(), PDO::PARAM_STR);}

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
        return self::$idString;
    }
    /**
     * Ritorna l'MAmministratore corrispondente all'Id passato come parametro
     * @param string $id
     * @return MAmministratore|null
     */
    public static function getAmministratore(string $id)
    {
        $db= FDataBase::getInstance();

        //echo $db->existDB(self::class,"id",$id);


        if($db->existDB(self::class,"id",$id)) {
            $db_result = $db->loadDB(self::class, "id", $id);
            if($db_result != null)
            {   $db_result=$db_result[0];
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

    /**
     * Controlla quali argomenti differiscono fra l'MAmministratore passato come parametro e quello presente nel DB
     * Aggiorna il DB con le modifiche
     * @param MAmministratore $amministratore
     * @return bool
     */
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

    /**
     * Controlla il match fra i parametri e il DB
     * @param string $mail
     * @param string $password
     * @return bool
     */
    public static function login(string $mail, string $password): bool
    {
        $db = FDataBase::getInstance();
        return $db->login(self::class, $mail, $password);
    }

    /**
     * Controlla che la mail passata come parametro sia presente nel DB
     * @param string $mail
     * @return bool
     */
    public static function emailEsistente(string $mail): bool
    {
        $db=FDataBase::getInstance();
        return $db->existDB(self::class, "mail", $mail);

    }
}

