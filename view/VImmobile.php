<?php


class VImmobile
{
    public static function vistaUtente($utente, $immobili,string $tipologia)
    {   $smarty=StartSmarty::configuration();
        $smarty->assign("path"    , $GLOBALS["path"]);
        $smarty->assign("immobili", $immobili);
        $smarty->assign("utente"  , $utente);
        if ($tipologia == "Vendita")
        {
            $smarty->display("inVendita.tpl");
        }
        else $smarty->display("inAffitto.tpl");

    }

    public static function vistaVisitor($immobili,string $tipologia)
    {
        $smarty=StartSmarty::configuration();
        $smarty->assign("path"    , $GLOBALS["path"]);
        $smarty->assign("immobili", $immobili);

        if ($tipologia == "Vendita")
        {
            $smarty->display("inVendita.tpl");
        }
        else $smarty->display("inAffitto.tpl");
    }
}