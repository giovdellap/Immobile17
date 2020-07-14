<?php

/**
 * Class FToken
 * Classe che si occupa della gestione dei token di login degli utenti (API/COOKIE)
 * @author Della Pelle - Di Domenica - Foderà
 * @package foundation
 */
class FToken
{
    /**
     * Aggiunge al DB la tupla id utente - token criptato con l'algoritmo BCRYPT
     * @param string $id
     * @param string $token
     * @param string $type API/COOKIE
     * @return bool
     */
    public static function addToken(string $id, string $token, string $type): bool
    {
        if($type === "API")
            $table = 'token_login';
        else $table = 'token_cookie';
        $db = FDataBase::getInstance();
        return $db->addToken($id, password_hash($token, PASSWORD_BCRYPT), $table);
    }

    /**
     * Verifica che esista un token corrispondente a quello passato come parametro
     * Ritorna l'id dell'utente se il match esiste, null altrimenti
     * @param string $token
     * @param string $type API/COOKIE
     * @return string|null
     */
    public static function verifyToken(string $token, string $type): ?string
    {
        if($type === "API")
            $table = 'token_login';
        else $table = 'token_cookie';
        $db = FDataBase::getInstance();
        $db_result = $db->loadToken($table);
        foreach ($db_result as &$row) {
            if (password_verify($token, $row['token']))
                return $row['id_utente'];
        }
        return null;

    }
}