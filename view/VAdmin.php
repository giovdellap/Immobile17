<?php


class VAdmin
{
    public static function showHomepage(Smarty $smarty)
    {
        $smarty->display('adminHomepage.tpl');
    }

    public static function showImmobili(Smarty $smarty, $immobili)
    {
        $smarty->assign('immobili', $immobili);
        $smarty->display('immobiliAdmin.tpl');
    }

    public static function showImmobile(Smarty $smarty, $immobile)
    {
        $smarty->assign('immobile', $immobile);
        $smarty->display('immobileAdmin.tpl');
    }
}