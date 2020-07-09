<?php


class FAgenteImmobiliare extends FUtente
{
    private static string $table = "agente_immobiliare";
    private static string $idString = "AG";

    /**
     * Ritorna un array con tutti gli agenti immobiliari presenti nel DB
     * Ogni agente ha la propria lista degli appuntamenti compresi fra $inizio e $fine
     * @param MData $inizio
     * @param Mdata $fine
     * @return array
     */
    public static function getAllAgenti(MData $inizio, Mdata $fine): ?array
    {
        $db = FDataBase::getInstance();
        $db_result = $db->loadAll(self::class);
        $agenti = array();
        foreach ($db_result as &$item)
            $agenti[] = self::AppUtenteInBetween($item["id"], $inizio,$fine);
        return $agenti;
    }
    /**
     * @return string
     */
    public static function getTable(): string
    {
        return self::$table;
    }

    /**
     * @return string
     */
    public static function getID():string
    {
        return self::$idString;
    }

}