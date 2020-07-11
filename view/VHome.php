<?php


class VHome
{


    public static function homepage (Smarty $smarty, MAgenzia $agenzia, array $immobili)
    {
        $smarty->assign("path"          , $GLOBALS["path"]);
        $smarty->assign("agenzia"       , $agenzia);
        $smarty->assign("immobili"     , $immobili);
        $smarty->assign("imgSlide1"     , $agenzia->getImmagini()[0]->viewImageHtml()) ; //slide immagini home da agenzia
        $smarty->assign("imgSlide2"     , $agenzia->getImmagini()[1]->viewImageHtml()) ; //slide immagini home da agenzia
        $smarty->assign("imgSlide3"     , $agenzia->getImmagini()[2]->viewImageHtml()) ; //slide immagini home da agenzia
        $smarty->display("home.tpl");
    }

    public static function aboutUs(Smarty $smarty,  array $immobili, array $agenti)
    {
        $smarty->assign("immobili" , $immobili);

        $smarty->assign('agenti', $agenti );

        $smarty->display("aboutUs.tpl");
    }

}