<?php

/**
 * Class VImmobile
 * Si occupa di visualizzare tramite Smarty le pagine relative agli immobili
 * @author Della Pelle - Di Domenica - Foderà
 * @package controller
 */
class VImmobile
{
    /**
     * @param Smarty $smarty
     * @param MImmobile $immobile
     * @param string $tipoUtente
     * @throws SmartyException
     */
    public static function visualizza(Smarty $smarty, MImmobile $immobile, string $tipoUtente)
    {
        $smarty->assign('tipoUtente', $tipoUtente);
        $smarty = VSmartyFactory::searchBarSmarty($smarty, array());
        $smarty->assign("immobile", $immobile);
        $smarty->display("schedaImmobile.tpl");
    }

    /**
     * @param Smarty $smarty
     * @param array $immobili
     * @throws SmartyException
     */
    public static function visualizzaImmobili(Smarty $smarty, array $immobili)
    {
        $smarty = VSmartyFactory::searchBarSmarty($smarty, array());
        $smarty->assign("immobili",$immobili);
        $smarty->display("immobili.tpl");
    }

    /**
     * @param Smarty $smarty
     * @param $immobili
     * @param $parameters
     * @throws SmartyException
     */
    public static function ricerca(Smarty $smarty, $immobili, $parameters)
    {
        $smarty = VSmartyFactory::searchBarSmarty($smarty, $parameters);
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
     * @throws Exception
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

        $smarty->display("calendario.tpl");
    }

}