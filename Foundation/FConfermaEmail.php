<?php

/**
 * Class FConfermaEmail
 * Si occupa delle interazioni con il DB per quanto riguarda il codice di conferma del cliente
 * @author Della Pelle - Di Domenica - Foderà
 * @package foundation
 */
class FConfermaEmail
{
    /**
     * Aggiunge la tupla cliente - codice al Database
     * @param MCliente $cliente
     * @param string $code
     * @return bool
     */
    public static function addCode(MCliente $cliente, string $code):bool
    {
        $db = FDataBase::getInstance();
        return $db->storeCode($cliente->getId(), $code);
    }

    /**
     * Ritorna true o false a seconda che la tupla cliente - codice sia presente o meno nel DB
     * @param MCliente $cliente
     * @param string $code
     * @return bool
     */
    public static function verifyCode(MCliente $cliente, string $code): bool
    {
        $db = FDataBase::getInstance();
        return $db->loadCode($cliente->getId(), $code);
    }
}