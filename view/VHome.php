<?php


class VHome
{


    public static function homepage (Smarty $smarty, MAgenzia $agenzia, array $immobili)
    {
        $smarty->assign("path"          , $GLOBALS["path"]);
        $smarty->assign("agenzia"       , $agenzia);
        $smarty->assign("immobili"     , $immobili);
        $smarty->display("home.tpl");
    }

    public static function aboutUs(Smarty $smarty,  array $immobili, array $agenti)
    {
        $smarty->assign("immobili" , $immobili);

        $smarty->assign('agenti', $agenti );

        $smarty->display("aboutUs.tpl");
    }

}