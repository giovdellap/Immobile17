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
        echo ("orarioInizio: ".$orarioInizio->getOrario()."\n");
        echo ("orarioFine: ".$orarioFine->getOrario()."\n");
        echo ("toCheckInizio: ".$toCheckInizio->getOrario()."\n");
        echo ("tocheckFine: ".$toCheckFine->getOrario()."\n");

        if(($toCheckInizio->getAnno() == $orarioInizio->getAnno()) && ($orarioFine->getAnno() == $toCheckFine->getAnno())
            && ($toCheckInizio->getMese() == $orarioInizio->getMese()) && ($orarioFine->getMese() == $toCheckFine->getMese())
            && ($toCheckInizio->getGiorno() == $orarioInizio->getGiorno()) && ($orarioFine->getGiorno() == $toCheckFine->getGiorno()))
        {
            echo("if1: ".($orarioInizio->getOrario() <= $toCheckInizio->getOrario() && $orarioFine->getOrario() >= $toCheckFine->getOrario())."\n");
            echo("if2: ".($toCheckFine->getOrario() > $orarioInizio->getOrario() && $toCheckFine->getOrario() < $orarioFine->getOrario())."\n");
            echo("if21: ".($toCheckFine->getOrario() >$orarioInizio->getOrario())."\n");
            echo("if22: ".($toCheckFine->getOrario() <$orarioFine->getOrario())."\n");
            echo("if3: ".($toCheckInizio->getOrario() > $orarioInizio->getOrario() && $toCheckInizio->getOrario() < $orarioFine->getOrario())."\n");

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
     * @param MData $toCheck
     * @param bool $inizio
     * @return bool
     */
    public function SovrapposizioneEstesa(MData $orarioInizio, MData $orarioFine, MData $toCheckInizio, MData $toCheckFine): bool
    {
        if(($toCheckInizio->getAnno() == $orarioInizio->getAnno()) && ($orarioFine->getAnno() == $toCheckFine->getAnno())
            && ($toCheckInizio->getMese() == $orarioInizio->getMese()) && ($orarioFine->getMese() == $toCheckFine->getMese())
            && ($toCheckInizio->getGiorno() == $orarioInizio->getGiorno()) && ($orarioFine->getGiorno() == $toCheckFine->getGiorno()))
        {
            $oraInizio = intval($orarioInizio->getOrario());
            $minutoInizio = ($orarioInizio->getOrario() - $oraInizio)*100;
            $minutoInizio = $minutoInizio - 30;
            if($minutoInizio < 0)
            {
                $minutoInizio = 60 + $minutoInizio;
                --$oraInizio;
            }
            $newInizio = clone $orarioInizio;
            $newInizio->setOrario($oraInizio + $minutoInizio/100);

            $oraFine = intval($orarioFine->getOrario());
            $minutoFine = ($orarioFine->getOrario() - $oraFine)*100;
            $minutoFine = $minutoFine + 30;
            if($minutoFine > 60)
            {
                $minutoFine = $minutoFine - 60;
                ++$oraFine;
            }
            $newFine = clone $orarioFine;
            $newFine->setOrario($oraFine + $minutoFine/100);

            return $this->sovrapposizione($newInizio, $newFine, $toCheckInizio, $toCheckFine);

        }
    }
}