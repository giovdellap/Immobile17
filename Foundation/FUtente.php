<?php


class FUtente extends FObject
{
    private static string $values="(:id, :nome, :cognome, :datanascita, :mail, 
                                    :password, :iscrizione, :verifica)";



    /**
     * @param PDOStatement $stmt
     * @param $obj
     * @param string $newId
     */
    public static function bind(PDOStatement $stmt, $obj, string $newId): void
    {
        $stmt->bindValue(':id', $newId, PDO::PARAM_STR);
        $stmt->bindValue(':nome', $obj->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':cognome', $obj->getCognome(), PDO::PARAM_STR);
        $stmt->bindValue(':datanascita', self::getDateString($obj->getDataNascita()), PDO::PARAM_STR);
        $stmt->bindValue(':mail', $obj->getMail(), PDO::PARAM_STR);
        $stmt->bindValue(':password', $obj->getPassword(), PDO::PARAM_STR);
        $stmt->bindValue(':iscrizione', self::getDateString($obj->getIscrizione()), PDO::PARAM_STR);
        $stmt->bindValue(':verifica', $obj->getAttivato(), PDO::PARAM_STR);
    }


    /**
     * @return string
     */
    public static function getValues(): string
    {
        return self::$values;
    }


    /**
     * Chiama la di controllo dell'esistenza della mail nel DB su FCliente o FAgenteImmobiliare a seconda del formato della mail
     * @param string $mail
     * @return bool
     */
    public static function emailesistente(string $mail):bool
    {
       if(strpos($mail, "@info.it"))
           return FAgenteImmobiliare::emailExist($mail);
       else
           return FCliente::emailExist($mail);
    }

    /**
     * Controllo dell'esistenza della mail da parte delle sottoclassi
     * @param string $mail
     * @return bool
     */
    public static function emailExist(string $mail): bool
    {
        $db=FDataBase::getInstance();
        return $db->existDB(self::class, "mail", $mail);

    }

    /**
     * Chiama la funzione di aggiunta al DB su FCliente o FAgenteImmobiliare
     * @param MUtente $utente
     * @return bool
     */
    public static function registrazione(MUtente $utente):bool
    {
        if($utente instanceof MCliente)
            return FCliente::addUtente($utente);
        else
            return FagenteImmobiliare::addUtente($utente);
    }

    /**
     * Aggiunta dell'MUtente al DB da parte delle sottoclassi
     * @param MUtente $utente
     * @return bool
     */
    public static function addUtente(MUtente $utente): bool
    {
        $db= FDataBase::getInstance();
        return $db->storeDb(self::class,$utente);
    }

    /**
     * Chiamata alla funzione di controllo della corrispondenza fra mail e password
     * Chiama la funzione loginCheck() su FCliente o FAgenteImmobiliare a seconda del formato della mail
     * @param string $mail
     * @param string $password
     * @return bool
     */
    public static function login(string $mail, string $password): bool
    {
        if(strpos($mail, "@info.it"))
            return FAgenteImmobiliare::loginCheck($mail, $password);
        else
            return FCliente::loginCheck($mail, $password);
    }

    /**
     * Controlla che mail e password corrispondano
     * @param string $mail
     * @param string $password
     * @return bool
     */
    public static function loginCheck(string $mail, string $password): bool
    {
        $db = FDataBase::getInstance();
        return $db->login(self::class, $mail, $password);
    }

    /**
     * Controlla che esista un Utente con l'Id passato come parametro
     * Chiama idExists() su FCliente o FAgenteImmobiliare a seconda del formato dell'Id
     * @param string $id
     * @return bool
     */
    public static function idEsistente(string $id): bool
    {
        if(strpos($id, "CL"))
            return FCliente::idExists($id);
        else return FagenteImmobiliare::idExists($id);
    }

    /**
     * Controlla che esista un Utente con l'Id passato come parametro
     * @param string $id
     * @return bool
     */
    public static function idExists(string $id): bool
    {
        $db = FDataBase::getInstance();
        return $db->existDB(self::class, "id", $id);
    }

    /**
     * Ritorna l'MUtente con l?id passato come parametro
     * Chiama getUtente() su FCliente o FAgenteImmobiliare a seconda del formato dell'Id
     * @param string $id
     * @return MUtente
     */
    public static function visualizzaUtente(string $id): MUtente
    {
        if(strpos($id, "CL"))
            return FCliente::idExists($id);
        else return FagenteImmobiliare::idExists($id);
    }

    /**
     * Ritorna l'Utente corrispondente all'Id passato come parametro
     * @param string $id
     * @return MUtente|null
     */
    public static function getUtente(string $id): ?MUtente
    {
        $db = FDataBase::getInstance();
        $db_result = $db->loadDB(self::class, "id", $id);
        if($db_result != null)
        {
            if(strpos($id, "CL"))
                $utente = new MCliente();
            else $utente = new MAgenteImmobiliare();
            self::setAttributiUtente($utente, $db_result);
            return $utente;
        }
        else return null;
    }

    /**
     * Imposta gli attributi di $utente con il contenuto di $db_result
     * @param MUtente $utente
     * @param array $db_result
     */
    public static function setAttributiUtente(MUtente $utente, array $db_result)
    {
        $utente->setId($db_result["id"]);
        $utente->setNome($db_result["nome"]);
        $utente->setCognome($db_result["cognome"]);
        $utente->setEmail($db_result["mail"]);
        $utente->setPassword($db_result["password"]);
        $utente->setDataNascita(self::getMDataFromString($db_result["datanascita"]));
        $utente->setIscrizione(self::getMDataFromString($db_result["iscrizione"]));
        $utente->setAttivato($db_result["verifica"]);
        $utente->setImmagine(FMedia::getMedia($utente->getId())[0]);
    }

    /**
     * Modifica l'Utente con i valori dell'Utente passato come parametro
     * Chiama modifyUtente() su FCliente o FAgenteImmobiliare a seconda dell'Utente
     * @param MUtente $utente
     * @return bool esito dell'operazione
     */
    public static function modificaUtente(MUtente $utente): bool
    {
        if($utente instanceof MCliente)
            FCliente::modifyUtente($utente);
        else
            FAgenteImmobiliare::modifyUtente($utente);
    }

    /**
     * Modifica l'Utente con i valori del nuovo Utente
     * @param MUtente $utente
     * @return bool esito dell'operazione
     */
    public static function modifyUtente(MUtente $utente)
    {
        $db = FDataBase::getInstance();
        $oldUtente = self::getUtente($utente->getId());
        $mods = array();
        if($utente->getNome() != $oldUtente->getNome())
            $mods["nome"] = $utente->getNome();
        if($utente->getCognome() != $oldUtente->getCognome())
            $mods["cognome"] = $utente->getCognome();
        if($utente->getEmail() != $oldUtente->getEmail())
            $mods["mail"] = $utente->getEmail();
        if($utente->getPassword() != $oldUtente)
            $mods["password"] = $utente->getPassword();
        if($utente->getDataNascita() != $oldUtente->getDataNascita())
            $mods["datanascita"] = self::getDateString($utente->getDataNascita());
        if($utente->getIscrizione() != $oldUtente->getIscrizione())
            $mods["iscrizione"] = self::getDateString($utente->getIscrizione());
        if($utente->isAttivato() != $oldUtente->isAttivato())
            $mods["verifica"] = $utente->isAttivato();

        foreach (array_keys($mods) as &$key)
        {
            $toReturn = $db->updateDB(self::class, $key, $mods[$key], "id", $utente->getId());
            if(!$toReturn)
                return false;
        }
        return true;
    }

    /**
     * Ritorna un MUtente con la lista appuntamenti completa
     * @param string $id
     * @return MUtente
     */
    public static function visualizzaAppUtente(string $id): MUtente{
        $utente = self::visualizzaUtente($id);
        $utente->setListAppuntamenti(FAppuntamento::visualizzaAppOggetto($id));
        return $utente;
    }

    /**
     * Ritorna l'MUtente con la lista appuntamenti completa degli appuntamenti fra le due date
     * @param string $id
     * @param $inizio
     * @param $fine
     * @return MUtente
     */
    public static function AppUtenteInBetween(string $id, MData $inizio, MData $fine): MUtente{
        $utente = self::visualizzaUtente($id);
        $utente->setListAppuntamenti(FAppuntamento::getAppInBetween($id, $inizio, $fine));
        return $utente;
    }

}