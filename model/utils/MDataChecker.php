<?php


class MDataChecker
{
    /**
     * Controlla se l'orario $toCheck si trova nel lasso di tempo compreso fra $orarioInizio e $orarioFine
     * In caso affermativo, ritorna True
     * @param MData $orarioInizio
     * @param MData $orarioFine
     * @param MData $toCheck
     * @return bool
     */
    public function sovrapposizione(MData $orarioInizio, MData $orarioFine, MData $toCheck): bool
    {
        if($toCheck->getAnno() == $orarioInizio->getAnno()
            && $toCheck->getMese() == $orarioInizio->getMese()
            && $toCheck->getGiorno() == $orarioInizio->getGiorno())
            if($toCheck->getOrario() > $orarioInizio->getOrario()
                && $toCheck->getOrario() < $orarioFine->getOrario())
                return true;
            else return false;
    }

    /**
     * Controlla che l'orario $toCheck si trovi nel lasso di tempo compreso fra $orarioInizio - 30 minuti
     * e $orarioFine + 30 minuti
     * In caso affermativo, ritorna True
     * @param MData $orarioInizio
     * @param MData $orarioFine
     * @param MData $toCheck
     * @return bool
     */
    public function SovrapposizioneEstesa(MData $orarioInizio, MData $orarioFine, MData $toCheck): bool
    {
        if($toCheck->getAnno() == $orarioInizio->getAnno()
            && $toCheck->getMese() == $orarioInizio->getMese()
            && $toCheck->getGiorno() == $orarioInizio->getGiorno())
        {
            $oraInizio = intval($orarioInizio->getOrario());
            $minutoInizio = ($orarioInizio->getOrario() - $oraInizio)*100;
            $minutoInizio = $minutoInizio - 30;
            if($minutoInizio < 0)
            {
                $minutoInizio = 60 + $minutoInizio;
                --$oraInizio;
            }
            $newInizio = $orarioInizio;
            $newInizio->setOrario($oraInizio + $minutoInizio/100);

            $oraFine = intval($orarioFine->getOrario());
            $minutoFine = ($orarioFine->getOrario() - $oraFine)*100;
            $minutoFine = $minutoFine + 30;
            if($minutoFine > 60)
            {
                $minutoFine = $minutoFine - 60;
                ++$oraFine;
            }
            $newFine = $orarioFine;
            $newFine->setOrario($oraFine + $minutoFine/100);

            return $this->sovrapposizione($newInizio, $newFine, $toCheck);

        }
    }
}