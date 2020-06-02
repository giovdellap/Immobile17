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
                if(FAmministratore::login($mail, $password))
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

    public static function visualizzaAgenzia(string $id): MAgenzia
    {
        return FAgenzia::getAgenzia($id);
    }
}