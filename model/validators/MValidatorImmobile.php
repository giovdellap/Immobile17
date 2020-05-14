<?php


class MValidatorImmobile implements MValidator
{
    /**
     * Controlla se l'appuntamento può essere inserito in calendario secondo i parametri per gli immobili
     * @param MAppuntamento $appuntamento
     * @return bool
     */
    public function validate(MAppuntamento $appuntamento): bool
    {
        $valido = true;
        $immobile = $appuntamento->getImmobile();
        foreach ($immobile->getListAppuntamenti() as &$appImmobile)
        {
            $checker = new MDataChecker();
            $valido = !$checker->sovrapposizione($appImmobile->getOrarioInizio(), $appImmobile->getOrarioFine(), $appuntamento->getOrarioInizio());
            if(!$valido) return $valido;
        }

        return true;
    }
}