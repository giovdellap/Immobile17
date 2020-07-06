<?php


class FConfermaEmail
{
    public static function addCode(MCliente $cliente, string $code):bool
    {
        $db = FDataBase::getInstance();
        return $db->storeCode($cliente->getId(), $code);
    }

    public static function verifyCode(MCliente $cliente, string $code): bool
    {
        $db = FDataBase::getInstance();
        return $db->loadCode($cliente->getId(), $code);
    }
}