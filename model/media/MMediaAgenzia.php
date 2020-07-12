<?php

/**
 * Class MMediaAgenzia
 * Classe che estende MMedia, contiene il parametro MAgenzia e i suoi metodi
 * @author Della Pelle - Di Domenica - Foderà
 * @package model/media
 */
class MMediaAgenzia extends MMedia
{
    private MAgenzia $agenzia;

    /**
     * @return MAgenzia
     */
    public function getAgenzia(): MAgenzia
    {
        return $this->agenzia;
    }

    /**
     * @param MAgenzia $agenzia
     */
    public function setAgenzia(MAgenzia $agenzia): void
    {
        $this->agenzia = $agenzia;
    }


}