<?php


class FPersistentManager
{


    public static function addImmobile (MImmobile $immobile){
        return FImmobile::addImmobile($immobile);

    }

    public static function visualizzaImmobile(string $id):MImmobile
    {
        return FImmobile::getImmobile($id);
    }

    public static function visualizzaImmobili(){
        return FImmobile::getImmobili();
    }

    public static function disabilitaImmobile(MImmobile $immobile):bool{

        return FImmobile::disabilita();

    }
}