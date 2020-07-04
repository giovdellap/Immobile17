<?php


class MValidatorGeneral implements MValidator
{

    public function validate(MAppuntamento $appuntamento): bool
    {
        if($appuntamento->getOrarioFine()->getWeekDay()==0 || $appuntamento->getOrarioFine()->getWeekDay()==6)
            return false;
        if($appuntamento->getOrarioInizio()->getOrario()<7.4)
            return false;
        if($appuntamento->getOrarioInizio()->getOrario()>20.1)
            return false;
        return true;
    }
}