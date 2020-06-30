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
        $smarty->assign("immobili",$immobili);
        $smarty->display("immobili.tpl");
    }

    public static function ricerca(Smarty $smarty, $immobili, $parameters)
    {
        $parametersNames = array('ti', 'pc', 'tp', 'pmin', 'pmax', 'gmin', 'gmax');
        foreach ($parametersNames as &$key)
        {
            if(key_exists($key, $parameters))
                $smarty->assign($key, $parameters[$key]);
            else $smarty->assign($key, 'notSetted');
        }
        $smarty->assign("immobili", $immobili);
        $smarty->display("immobili.tpl");
    }

    public static function calendario(Smarty $smarty, array $appLiberi, MData $inizio, MData $fine, MImmobile $immobile)
    {
        $smarty->assign("immobile", $immobile);
        $smarty->assign("inizio", $inizio);
        $smarty->assign("fine", $fine);
        $smarty->assign("appLiberi", $appLiberi);
        $smarty->display("calendario.tpl");
    }

    public function confermaAppuntamento(MUtente $utente, MAppuntamento $appuntamento)
    {
        // TO DO
    }
}