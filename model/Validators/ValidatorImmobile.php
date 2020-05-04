<?php


class ValidatorImmobile implements Validator
{

    public function validate(Appuntamento $appuntamento): bool
    {
        $valido = true;
        $immobile = $appuntamento->getImmobile();
        foreach ($immobile->getListAppuntamenti() as &$appImmobile)
        {
            //controllo orari
            $valido = false;
        }

        return $valido;
    }
}