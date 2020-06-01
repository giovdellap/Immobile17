<?php


class FPersistentManager
{


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