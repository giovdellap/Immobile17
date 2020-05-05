<?php


class ValidatorAgenteImmobiliare implements Validator
{
    /**
     * Controlla se l'appuntamento può essere inserito in calendario secondo i parametri per gli agenti immobiliari
     * @param Appuntamento $appuntamento
     * @return bool
     */
    public function validate(Appuntamento $appuntamento): bool
    {
        $valido = true;
        $agenteImmobiliare = $appuntamento->getAgenteImmobiliare();
        foreach ($agenteImmobiliare->getListAppuntamenti() as &$appAgente)
        {
            $checker = new DataChecker();
            $valido = !$checker->SovrapposizioneEstesa($appAgente->getOrarioInizio(), $appAgente->getOrarioFine(), $appuntamento->getOrarioInizio());
            if(!$valido) return $valido;
        }

        return true;
    }
}