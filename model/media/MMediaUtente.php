<?php

/**
 * Class MMediaUtente
 * Classe che estende MMedia, contiene il parametro MUtente e i suoi metodi
 * @author Della Pelle - Di Domenica - Foderà
 * @package model/media
 */
class MMediaUtente extends MMedia
{
    private MUtente $utente;

    /**
     * @return MUtente
     */
    public function getUtente(): MUtente
    {
        return $this->utente;
    }

    /**
     * @param MUtente $utente
     */
    public function setUtente(MUtente $utente): void
    {
        $this->utente = $utente;
    }

}