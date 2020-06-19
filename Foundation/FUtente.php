<?php


class FUtente extends FObject
{
    private static string $values="(:id, :nome, :cognome, :datanascita, :mail, 
                                    :password, :iscrizione, :verifica)";

    /**
     * @return string
     */
    public static function getValues(): string
    {
        return self::$values;
    }

    /**
     * @param PDOStatement $stmt
     * @param $obj
     * @param string $newId
     */
    public static function bind(PDOStatement $stmt, $obj, string $newId): void
    {
        $stmt->bindValue(':id',          $newId,                                      PDO::PARAM_STR);
        $stmt->bindValue(':nome',        $obj->getNome(),                             PDO::PARAM_STR);
        $stmt->bindValue(':cognome',     $obj->getCognome(),                          PDO::PARAM_STR);
        $stmt->bindValue(':datanascita', self::getDateString($obj->getDataNascita()), PDO::PARAM_STR);
        $stmt->bindValue(':mail',        $obj->getEmail(),                            PDO::PARAM_STR);
        $stmt->bindValue(':password',    $obj->getPassword(),                         PDO::PARAM_STR);
        $stmt->bindValue(':iscrizione',  self::getDateString($obj->getIscrizione()),  PDO::PARAM_STR);
        $stmt->bindValue(':verifica',    $obj->isAttivato(),                          PDO::PARAM_STR);
    }

    /**
     * Chiama la di controllo dell'esistenza della mail nel DB su FCliente o FAgenteImmobiliare a seconda del formato della mail
     * @param string $mail
     * @return bool
     */
    public static function emailesistente(string $mail):bool
    {
        $db = FDataBase::getInstance();
        if(strpos($mail, "@info.it"))
            return $db->existDB("FAgenteImmobiliare", "mail", $mail);
        else
            return $db->existDB("FCliente", "mail", $mail);
    }

    /**
     * Chiama la funzione di aggiunta al DB su FCliente o FAgenteImmobiliare
     * @param MUtente $utente
     * @return bool
     */
    public static function registrazione(MUtente $utente):bool
    {
        $db= FDataBase::getInstance();
        if($utente instanceof MCliente)
            return $db->storeDb(FCliente::class, $utente);
        else if ($utente instanceof MAgenteImmobiliare)
            return $db->storeDb(FAgenteImmobiliare::class, $utente);
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
        $db = FDataBase::getInstance();
        if(strpos($mail, "@info.it"))
            return $db->login(FAgenteImmobiliare::class, $mail, $password);
        else
            return $db->login(FCliente::class, $mail, $password);
    }

    /**
     * Controlla che esista un Utente con l'Id passato come parametro
     * @param string $id
     * @return bool
     */
    public static function idEsistente(string $id): bool
    {
        $db = FDataBase::getInstance();
        if(self::identifyId($id) === "CLIENTE")
            return $db->existDB(FCliente::class, "id", $id);
        else return $db->existDB(FAgenteImmobiliare::class, "id", $id);
    }

    /**
     * Ritorna l'Utente corrispondente all'Id passato come parametro
     * @param string $id
     * @return MUtente|null
     */
    public static function visualizzaUtente(string $id): ?MUtente
    {
        $db = FDataBase::getInstance();
        if(self::identifyId($id) === "CLIENTE") {
            $db_result = $db->loadDB(FCliente::class, "id", $id);
            $utente = new MCliente();
        }
        else {
            $db_result = $db->loadDB(FAgenteImmobiliare::class, "id", $id);
            $utente = new MAgenteImmobiliare();
        }

        if($db_result != null) {
            self::setAttributiUtente($utente, $db_result[0]);
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
        if(FMedia::getMedia($utente->getId()) != null)
            $utente->setImmagine(FMedia::getMedia($utente->getId())[0]);
    }

    /**
     * Modifica l'Utente con i valori del nuovo Utente
     * @param MUtente $utente
     * @return bool esito dell'operazione
     */
    public static function modificaUtente(MUtente $utente)
    {
        $db = FDataBase::getInstance();
        $oldUtente = self::visualizzaUtente($utente->getId());
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
            if(strcmp(self::identifyId($utente->getId()), "CLIENTE")===0)
                $toReturn = $db->updateDB(FCliente::class, $key, $mods[$key], "id", $utente->getId());
            else
                $toReturn = $db->updateDB(FCliente::class, $key, $mods[$key], "id", $utente->getId());
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

    public static function loadIDbyEmail(string $email)
    {
        $db = FDataBase::getInstance();
        if(strpos($email, '@info.it'))
            return $db->getIDby(FAgenteImmobiliare::class, "mail", $email);

        else
            return $db-> getIDby(FCliente::class, "mail", $email);



    }




}