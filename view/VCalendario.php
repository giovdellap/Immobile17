<?php


class VCalendario
{
    //da rifare!
    public static function getDayStrings(MData $inizio, MData $fine): array
    {
        $data = clone $inizio;
        $newFine = clone $fine;
        $newFine->nextDay();
        $to_return = [];
        while ($data->getGiorno() != $newFine->getGiorno())
        {
            $string = $data->getNomeGiorno() . "," . $data->getGiorno();
            $to_return[] = $string;
            $data->nextDay();
        }
        return $to_return;

    }

    public static function getWeekDays(MData $inizio, MData $fine)
    {
        $data = clone $inizio;
        $to_return = [];
        while ($data !== $fine)
        {
            $newData = clone $data;
            $to_return[] = $newData;
            $data->nextDay();
        }
        $to_return[]= $fine;
        return $to_return;
    }
}