<?php

/**
 * Class FMedia
 * Si occupa di passare alle classi preposte gli oggetti FMedia per le operazioni di aggiunta, rimozione e lettura dal Database
 * @author Della Pelle - Di Domenica - Foderà
 * @package foundation/FMedia
 */
class FMedia
{
    /**
     * Chiama il metodo di aggiunta al database della classe preposta per la tipologia di MMedia
     * @param MMedia $media
     * @return bool
     */
    public static function addMedia (MMedia $media):bool
    {
        if ($media instanceof MMediaAgenzia)
            return FMediaAgenzia::storeMedia($media);
        else if ($media instanceof MMediaUtente)
            if ($media->getUtente() instanceof MCliente)
                return FMediaCliente::storeMedia($media);
            else return FMediaAgenteImmobiliare::storeMedia($media);
        else if ($media instanceof MMediaImmobile)
            return FMediaImmobile::storeMedia($media);
    }

    /**
     * Chiama il metodo di lettura dal database della classe preposta per la tipologia di MMedia
     * @param string $id
     * @return array|null
     */
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

    /**
     * Chiama il metodo di rimozione dal database della classe preposta per la tipologia di MMedia
     * @param string $id
     * @return bool
     */
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