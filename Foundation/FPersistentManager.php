<?php


class FPersistentManager
{
    public static function registrazione(MUtente $utente):string
    {
        if(FUtente::emailEsistente($utente))
            return "EMAIL ALREADY EXISTS!";

        else if(FUtente::registrazione($utente))
            return "OK";
        else
            return "REGISTRATION FAILED";

    }
    public static function login(string $mail, string $password):string
    {
        if(strpos($mail,"@admin.it"))
        {
            if(FAmministratore::emailEsistente($mail))
            {
                if(FAmministratore::login($mail, $password,))
                    return "OK";
                else
                    return "WRONG PASSWORD";
            }
            else
                return "WRONG EMAIL";
        }
        else
        {
            if(FUtente::emailEsistente($mail))
            {
                if(FUtente::login($mail, $password))
                    return "OK";
                else
                    return "WRONG PASSWORD";
            }
            else
                return "WRONG EMAIL";
        }

    }

    public static function addImmobile (MImmobile $immobile){
        return FImmobile::addImmobile($immobile);
    }

    public static function addUtente (MUtente $utente){
        return FUtente::addUtente($utente);
    }
    public static function visualizzaImmobile(string $id):MImmobile {
        return FImmobile::getImmobile($id);
    }

    public static function visualizzaImmobili(string $idAgenzia): MAgenzia
    {
        return FAgenzia::getImmobili($idAgenzia);
    }

    public static function disabilitaImmobile(MImmobile $immobile):bool{
        return FImmobile::disabilita($immobile);
    }

    public static function modificaImmobile(MImmobile $immobile): bool{
        return FImmobile::modificaImmobile($immobile);
    }

    public static function modificaAgenzia(MAgenzia $agenzia): bool{
        return FAgenzia::modificaAgenzia($agenzia);
    }

    public static function visualizzaAgenzia(string $id): MAgenzia
    {
        return FAgenzia::getAgenzia($id);
    }

    public static function esisteUtente(string $id): bool
    {
        return FUtente::idEsistente($id);
    }

    public static function visualizzaUtente(string $id): MUtente
    {
        return FUtente::visualizzaUtente($id);
    }

    public static function modificaUtente(MUtente $utente): bool
    {
        return FUtente::modificaUtente($utente);
    }

    public static function visualizzaAmministratore(string $id)
    {
        return FAmministratore::getAmministratore($id);
    }

    public static function modificaAmministratore(MAmministratore $amministratore): bool
    {
        return FAmministratore::modificaAmministratore($amministratore);
    }

    public static function addAppuntamento(MAppuntamento $appuntamento) :bool
    {
        return FAppuntamento::addAppuntamento($appuntamento);
    }

    public static function deleteAppuntamento(string $id) :bool
    {
        return FAppuntamento::deleteAppuntamento($id);
    }

    public static function visualizzaAppUtente(string $id): MUtente
    {
        return FUtente::visualizzaAppUtente($id);
    }

    public static function getBusyWeek(string $idImm, string $idCliente,MData $dataInizio,MData $dataFine): MAgenzia
    {
        return MAgenzia::getBusyWeek($idImm, $idCliente, $dataInizio. $dataFine);
    }
}