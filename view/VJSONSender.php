<?php


class VJSONSender
{
    public static function headerMaker() {
        header('Access-Control-Allow-Origin: *' );
        header('Access-Control-Allow-Methods: POST, GET');
    }

    public static function homepage($immobili)
    {
        self::headerMaker();
        echo json_encode(($immobili));
    }

    public static function sendToken($token, $utente)
    {
        self::headerMaker();
        echo json_encode(array('token' => $token, 'utente' => $utente));
    }

    public static function loginError($error)
    {
        self::headerMaker();
        echo json_encode(array('error' => $error));
    }

}