<?php


class MValidatorGeneral implements MValidator
{

    public function validate(MAppuntamento $appuntamento): bool
    {
        $today = MData::getToday();
        if($appuntamento->getOrarioFine()->getWeekDay()==0 || $appuntamento->getOrarioFine()->getWeekDay()==6)
            return false;
        else if($appuntamento->getOrarioInizio()->getOrario()<7.4)
            return false;
        else if($appuntamento->getOrarioInizio()->getOrario()>20.1)
            return false;
        else if($appuntamento->getOrarioInizio()->getMese()<$today->getMese())
            return false;
        else if($appuntamento->getOrarioInizio()->getMese() == $today->getMese()
                && $appuntamento->getOrarioInizio()->getGiorno() < $today->getGiorno())
            return false;
        else if($appuntamento->getOrarioInizio()->getMese() == $today->getMese()
            && $appuntamento->getOrarioInizio()->getGiorno()== $today->getGiorno()
            && $appuntamento->getOrarioInizio()->getOrario()<$today->getOrario())
            return false;
        else return true;
    }
}