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
        $notValido = false;
        $cliente = $appuntamento->getCliente();
        foreach ($cliente->getListAppuntamenti() as &$appCliente)
        {
            $checker = new MDataChecker();
            if ($checker->SovrapposizioneEstesa($appCliente->getOrarioInizio(), $appCliente->getOrarioFine(), $appuntamento->getOrarioInizio()))
                return false;

        }

        return true;
    }
}