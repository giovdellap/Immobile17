<?php


class MValidatorAgenteImmobiliare implements MValidator
{
    /**
     * Controlla se l'appuntamento può essere inserito in calendario secondo i parametri per gli agenti immobiliari
     * @param MAppuntamento $appuntamento
     * @return bool
     */
    public function validate(MAppuntamento $appuntamento): bool
    {
        $notValido = false;
        $agenteImmobiliare = $appuntamento->getAgenteImmobiliare();
        foreach ($agenteImmobiliare->getListAppuntamenti() as &$appAgente)
        {
            $checker = new MDataChecker();
            $notValido = $checker->SovrapposizioneEstesa($appAgente->getOrarioInizio(), $appAgente->getOrarioFine(), $appuntamento->getOrarioInizio());
            if($notValido) return false;
        }

        return true;
    }
}