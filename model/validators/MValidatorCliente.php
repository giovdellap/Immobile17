<?php


class MValidatorCliente implements MValidator
{
    /**
     * Controlla se l'appuntamento può essere inserito in calendario secondo i parametri per i clienti
     * @param MAppuntamento $appuntamento
     * @return bool
     */
    public function validate(MAppuntamento $appuntamento): bool
    {
        $cliente = $appuntamento->getCliente();
        if(!$cliente->isAttivato()) return false;
        $checker = new MDataChecker();
        foreach ($cliente->getListAppuntamenti() as &$appCliente)
        {
            $valido = !$checker->SovrapposizioneEstesa($appCliente->getOrarioInizio(), $appCliente->getOrarioFine(), $appuntamento->getOrarioInizio(), $appuntamento->getOrarioFine());
            if(!$valido) return false;

        }

        return true;
    }
}