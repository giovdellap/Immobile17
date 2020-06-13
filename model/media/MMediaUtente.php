<?php


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