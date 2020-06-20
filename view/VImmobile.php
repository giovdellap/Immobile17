<?php


class VImmobile
{
    public static function vendita(Smarty $smarty, $immobili)
    {
        $smarty->assign("immobili", $immobili);
        $smarty->display("inVendita.tpl");
    }

    public static function affitto(Smarty $smarty, $immobili)
    {
        $smarty->assign("immobili", $immobili);
        $smarty->display("inAffitto.tpl");
    }

    public static function ricerca(Smarty $smarty, $immobili, $parameters)
    {
        // TO DO
    }
}