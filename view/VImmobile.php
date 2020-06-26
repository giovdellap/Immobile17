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
        $smarty->assign("parametri", $parameters);
        $smarty->assign("immobili", $immobili);
        $smarty->display("immobili.tpl");
    }
}