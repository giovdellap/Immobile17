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
        $valido = true;
        $agenteImmobiliare = $appuntamento->getAgenteImmobiliare();
        foreach ($agenteImmobiliare->getListAppuntamenti() as &$appAgente)
        {
            $checker = new MDataChecker();
            $valido = !$checker->SovrapposizioneEstesa($appAgente->getOrarioInizio(), $appAgente->getOrarioFine(), $appuntamento->getOrarioInizio());
            if(!$valido) return $valido;
        }

        return true;
    }
}