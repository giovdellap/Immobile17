<?php

/**
 * Class FToken
 * Classe che si occupa della gestione dei token di login degli utenti
 * @author Della Pelle - Di Domenica - Foderà
 * @package foundation
 */
class FToken
{
    /**
     * Aggiunge al DB la tupla id utente - token criptato con l'algoritmo BCRYPT
     * @param string $id
     * @param string $token
     * @return bool
     */
    public static function addToken(string $id, string $token): bool
    {
        $db = FDataBase::getInstance();
        return $db->addToken($id, password_hash($token, PASSWORD_BCRYPT));
    }

    /**
     * Verifica che esista un token corrispondente a quello passato come parametro
     * Ritorna l'id dell'utente se il match esiste, null altrimenti
     * @param string $token
     * @return string|null
     */
    public static function verifyToken(string $token): ?string
    {
        $db = FDataBase::getInstance();
        $db_result = $db->loadToken();
        foreach ($db_result as &$row) {
            if (password_verify($token, $row['token']))
                return $row['id_utente'];
        }
        return null;

    }
}