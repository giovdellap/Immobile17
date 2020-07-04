<?php


class VImmobile
{

    public static function visualizza(Smarty $smarty, MImmobile $immobile)
    {
        $smarty = VSmartyFactory::searchBarSmarty($smarty, array());
        $smarty->assign("immobile", $immobile);
        $smarty->display("schedaImmobile.tpl");
    }

    public static function visualizzaImmobili(Smarty $smarty, array $immobili)
    {
        $smarty = VSmartyFactory::searchBarSmarty($smarty, array());
        $smarty->assign("immobili",$immobili);
        $smarty->display("immobili.tpl");
    }


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
     */
    public static function calendario(Smarty $smarty, array $appLiberi, MData $inizio, MData $fine, MImmobile $immobile)
    {
        //print_r($appLiberi[0]);
        print_r($inizio->getDateString());

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


}