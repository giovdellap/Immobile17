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
        $immobile = $appuntamento->getImmobile();
        if(!$immobile->isAttivo()) return false;
        $checker = new MDataChecker();
        foreach ($immobile->getListAppuntamenti() as &$appImmobile)
        {
            $notValido = $checker->sovrapposizione($appImmobile->getOrarioInizio(), $appImmobile->getOrarioFine(), $appuntamento->getOrarioInizio(), $appuntamento->getOrarioFine());
            if($notValido) return false;
        }

        return true;
    }
}