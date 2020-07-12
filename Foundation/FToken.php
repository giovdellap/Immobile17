<?php


class FToken
{
    public static function addToken(string $id, string $token): bool
    {
        $db = FDataBase::getInstance();
        return $db->addToken($id, password_hash($token, PASSWORD_BCRYPT));
    }

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