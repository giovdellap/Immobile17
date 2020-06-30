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
        $fd = new MData($inizio->getAnno(), $inizio->getMese(), $inizio->getGiorno(), $inizio->getOrario());
        $smarty->assign("fd", $fd);
        $tr = new MData($inizio->getAnno(), $inizio->getMese(), $inizio->getGiorno(), $inizio->getOrario());
        $smarty->assign("tr", $tr);
        $fine->nextDay();
        $smarty->assign("immobile", $immobile);
        $smarty->assign("inizio", $inizio);
        $smarty->assign("fine", $fine);
        $smarty->assign("appLiberi", $appLiberi);
        $smarty->assign("giorni", VCalendario::getDayStrings($inizio, $fine));
        $smarty->display("calendario.tpl");
    }

    public function confermaAppuntamento(MUtente $utente, MAppuntamento $appuntamento)
    {
        // TO DO
    }
}