<?php


class ValidatorImmobile implements Validator
{
    /**
     * Controlla se l'appuntamento può essere inserito in calendario secondo i parametri per gli immobili
     * @param Appuntamento $appuntamento
     * @return bool
     */
    public function validate(Appuntamento $appuntamento): bool
    {
        $valido = true;
        $immobile = $appuntamento->getImmobile();
        foreach ($immobile->getListAppuntamenti() as &$appImmobile)
        {
            $checker = new DataChecker();
            $valido = !$checker->sovrapposizione($appImmobile->getOrarioInizio(), $appImmobile->getOrarioFine(), $appuntamento->getOrarioInizio());
            if(!$valido) return $valido;
        }

        return true;
    }
}