<?php

/**
 * Class MMediaImmobile
 * Classe che estende MMedia, contiene il parametro MImmobile e i suoi metodi
 * @author Della Pelle - Di Domenica - Foderà
 * @package model/media
 */
class MMediaImmobile extends MMedia
{
    private MImmobile $immobile;

    /**
     * @return MImmobile
     */
    public function getImmobile(): MImmobile
    {
        return $this->immobile;
    }

    /**
     * @param MImmobile $immobile
     */
    public function setImmobile(MImmobile $immobile): void
    {
        $this->immobile = $immobile;
    }


}