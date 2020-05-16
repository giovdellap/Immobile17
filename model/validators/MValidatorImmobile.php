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
        $notValido = false;
        $immobile = $appuntamento->getImmobile();
        foreach ($immobile->getListAppuntamenti() as &$appImmobile)
        {
            $checker = new MDataChecker();
            $notValido = $checker->sovrapposizione($appImmobile->getOrarioInizio(), $appImmobile->getOrarioFine(), $appuntamento->getOrarioInizio());
            if($notValido) return false;
        }

        return true;
    }
}