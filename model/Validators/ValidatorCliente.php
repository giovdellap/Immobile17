<?php


class ValidatorCliente implements Validator
{
    /**
     * Controlla se l'appuntamento può essere inserito in calendario secondo i parametri per i clienti
     * @param Appuntamento $appuntamento
     * @return bool
     */
    public function validate(Appuntamento $appuntamento): bool
    {
        $valido = true;
        $cliente = $appuntamento->getCliente();
        foreach ($cliente->getListAppuntamenti() as &$appAgente)
        {
            $checker = new DataChecker();
            $valido = !$checker->SovrapposizioneEstesa($appAgente->getOrarioInizio(), $appAgente->getOrarioFine(), $appuntamento->getOrarioInizio());
            if(!$valido) return $valido;
        }

        return true;
    }
}