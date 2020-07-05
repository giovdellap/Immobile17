<?php


class VAdmin
{
    public static function showHomepage(Smarty $smarty, array $immobili, array $clienti, array $agenti)
    {
        $smarty->assign('immobili', $immobili);
        $smarty->assign('clienti',$clienti);
        $smarty->assign('agenti', $agenti);
        $smarty->assign('toAppend', 'adminDashboard.tpl');
        $smarty->display('adminPage.tpl');
    }

    public static function showImmobili(Smarty $smarty,array $immobili)
    {
        $smarty->assign('immobili', $immobili);
        $smarty->assign('toAppend', 'listaImmobili.tpl');
        $smarty->display('adminPage.tpl');
    }

    public static function showImmobile(Smarty $smarty, $immobile)
    {
        $smarty->assign('immobile', $immobile);
        $smarty->display('immobileAdmin.tpl');
    }

    public static function showClienti(Smarty $smarty, array $clienti)
    {
        $smarty->assign('clienti', $clienti);
        $smarty->assign('toAppend', 'listaClienti.tpl');
        $smarty->display('adminPage.tpl');
    }

    public static function showAgenti(Smarty $smarty, array $agenti)
    {
        $smarty->assign('agenti', $agenti);
        $smarty->assign('toAppend', 'listaAgenti.tpl');
        $smarty->display('adminPage.tpl');
    }

    public static function showAgenzia(Smarty $smarty,MAgenzia $agenzia)
    {
        $smarty->assign('agenzia', $agenzia);
        $smarty->assign('toAppend', 'visualizzaAgenzia.tpl');
        $smarty->display('adminPage.tpl');
    }
}