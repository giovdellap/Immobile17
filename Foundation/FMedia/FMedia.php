<?php

class FMedia
{
    public static function addMedia (MMedia $media):bool
    {
        if ($media instanceof MMediaAgenzia)
            return FMediaAgenzia::storeMedia($media);
        else if ($media instanceof MMediaUtente)
            if ($media->getUtente() instanceof MCliente)
                return FMediaCliente::storeMedia($media);
            else return FMediaAgenteImmobiliare::storeMedia($media);
        else if ($media instanceof MMediaImmobileImmobile)
            return FMediaImmobile::storeMedia($media);
    }

    public static function getMedia (string $id): ?array
    {
        if (FObject::identifyId($id)=="CLIENTE")
            return FMediaCliente::loadMedia($id);
        else if (FObject::identifyId($id)=="AGENTE IMMOBILIARE")
            return FMediaAgenteImmobiliare::loadMedia($id);
        else if (FObject::identifyId($id)=="AGENZIA")
            return FMediaAgenzia::loadMedia($id);
        else if (FObject::identifyId($id)=="IMMOBILE")
            return FMediaImmobile::loadMedia($id);
        else return null;
    }

    public static function removeMedia(string $id):bool
    {
        if (FObject::identifyId($id)=="CLIENTE")
            return FMediaCliente::removeMedia($id);
        else if (FObject::identifyId($id)=="AGENTE IMMOBILIARE")
            return FMediaAgenteImmobiliare::removeMedia($id);
        else if (FObject::identifyId($id)=="AGENZIA")
            return FMediaAgenzia::removeMedia($id);
        else if (FObject::identifyId($id)=="IMMOBILE")
            return FMediaAgenzia::removeMedia($id);
        else return false;
    }

}