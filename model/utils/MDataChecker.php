<?php


class MDataChecker
{
    /**
     * Controlla se l'orario $toCheck si trova nel lasso di tempo compreso fra $orarioInizio e $orarioFine
     * In caso affermativo, ritorna True
     * @param MData $orarioInizio
     * @param MData $orarioFine
     * @param MData $toCheckInizio
     * @param MData $toCheckFine
     * @return bool
     */
    public function sovrapposizione(MData $orarioInizio, MData $orarioFine, MData $toCheckInizio, MData $toCheckFine): bool
    {
        if(($toCheckInizio->getAnno() == $orarioInizio->getAnno()) && ($orarioFine->getAnno() == $toCheckFine->getAnno())
            && ($toCheckInizio->getMese() == $orarioInizio->getMese()) && ($orarioFine->getMese() == $toCheckFine->getMese())
            && ($toCheckInizio->getGiorno() == $orarioInizio->getGiorno()) && ($orarioFine->getGiorno() == $toCheckFine->getGiorno()))
        {

            if(($orarioInizio->getOrario() <= $toCheckInizio->getOrario() && $orarioFine->getOrario() >= $toCheckFine->getOrario()) ||
                ($toCheckFine->getOrario() > $orarioInizio->getOrario() && $toCheckFine->getOrario() < $orarioFine->getOrario()) ||
                ($toCheckInizio->getOrario() > $orarioInizio->getOrario() && $toCheckInizio->getOrario() < $orarioFine->getOrario()))
                return true;
            else return false;
        }
        else return false;
    }

    /**
     * Controlla che l'orario $toCheck si trovi nel lasso di tempo compreso fra $orarioInizio - 30 minuti
     * e $orarioFine + 30 minuti
     * In caso affermativo, ritorna True
     * @param MData $orarioInizio
     * @param MData $orarioFine
     * @param MData $toCheckInizio
     * @param MData $toCheckFine
     * @return bool
     */
    public function SovrapposizioneEstesa(MData $orarioInizio, MData $orarioFine, MData $toCheckInizio, MData $toCheckFine): bool
    {
        /**
        echo("orarioInizio: ");
        print_r($orarioInizio);
        echo("\nirariofine: ");
        print_r($orarioFine);
        echo("\ntocheckInizio: ");
        print_r($toCheckInizio);
        echo("\ntoCheckFine: ");
        print_r($toCheckFine);
        **/

        if(($toCheckInizio->getAnno() == $orarioInizio->getAnno()) && ($orarioFine->getAnno() == $toCheckFine->getAnno())
            && ($toCheckInizio->getMese() == $orarioInizio->getMese()) && ($orarioFine->getMese() == $toCheckFine->getMese())
            && ($toCheckInizio->getGiorno() == $orarioInizio->getGiorno()) && ($orarioFine->getGiorno() == $toCheckFine->getGiorno()))
        {
            $newInizio = clone $orarioInizio;
            $newInizio->incrementoOrario(-30);
            $newFine = clone $orarioFine;
            $newFine->incrementoOrario(30);
            return $this->sovrapposizione($newInizio, $newFine, $toCheckInizio, $toCheckFine);
        }
        else return false;

    }
}