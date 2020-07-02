<?php


class VImmobile
{

    public static function visualizza(Smarty $smarty, MImmobile $immobile)
    {

        $smarty->assign("immobile", $immobile);
        $smarty->display("schedaImmobile.tpl");
    }

    public static function visualizzaImmobili(Smarty $smarty, array $immobili)
    {
        $smarty = self::searchBarSmarty($smarty, array());
        $smarty->assign("immobili",$immobili);
        $smarty->display("immobili.tpl");
    }


    public static function ricerca(Smarty $smarty, $immobili, $parameters)
    {
        $smarty = self::searchBarSmarty($smarty, $parameters);
        $smarty->assign("immobili", $immobili);
        $smarty->display("immobili.tpl");
    }

    /**
     * @param Smarty $smarty
     * @param array $appLiberi
     * @param MData $inizio
     * @param MData $fine
     * @param MImmobile $immobile
     * @throws SmartyException
     */
    public static function calendario(Smarty $smarty, array $appLiberi, MData $inizio, MData $fine, MImmobile $immobile)
    {

        $smarty->assign("immobile", $immobile);
        $smarty->assign("inizio", $inizio);
        $smarty->assign("fine", $fine);
        $smarty->assign("appLiberi", $appLiberi);

        $smarty->assign("prevInizio", MData::shiftedData($inizio, -7));
        $smarty->assign("prevFine", MData::shiftedData($fine, -7));
        $smarty->assign("nextInizio", MData::shiftedData($inizio, 7));
        $smarty->assign("nextFine", MData::shiftedData($fine, 7));

        //$smarty->left_delimiter = "{{";
        //$smarty->right_delimiter = "}}";
        $smarty->display("calendario.tpl");
    }

    public function confermaAppuntamento(MUtente $utente, MAppuntamento $appuntamento)
    {
        // TO DO
    }

    private static function searchBarSmarty(Smarty $smarty, array $parameters): Smarty
    {
        $parametersNames = array('ti', 'pc', 'tp');
        foreach ($parametersNames as $key)
        {
            if(key_exists($key, $parameters))
                $smarty->assign($key, $parameters[$key]);
            else $smarty->assign($key, 'notSetted');
        }
        if(!key_exists('pmin', $parameters))
            $smarty->assign('pmin', 100);
        if(!key_exists('pmax', $parameters))
            $smarty->assign('pmax', 1000000);
        if(!key_exists('gmin', $parameters))
            $smarty->assign('gmin', 0);
        if(!key_exists('gmax', $parameters))
            $smarty->assign('gmax', 2000);
        return $smarty;
    }
}