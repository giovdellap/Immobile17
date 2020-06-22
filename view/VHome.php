<?php


class VHome
{
    public static function homepage (Smarty $smarty, MAgenzia $agenzia, array $immobili)
    {
        $smarty->assign("path"          , $GLOBALS["path"]);
        $smarty->assign("agenzia"       , $agenzia);
        $smarty->assign("immobile0"     , $immobili[0]);
        $smarty->assign("immobile1"     , $immobili[1]);
        $smarty->assign("immobile2"     , $immobili[2]);
        $smarty->assign("imgSlide1"     , $agenzia->getImmagini()[0]->viewImageHtml()) ; //slide immagini home da agenzia
        $smarty->assign("imgSlide2"     , $agenzia->getImmagini()[1]->viewImageHtml()) ; //slide immagini home da agenzia
        $smarty->assign("imgSlide3"     , $agenzia->getImmagini()[2]->viewImageHtml()) ; //slide immagini home da agenzia
        $smarty->assign("imgTop1"       , $immobili[0]->getImmagini());
        $smarty->assign("imgTop2"       , $immobili[1]->getImmagini());
        $smarty->assign("imgTop3"       , $immobili[2]->getImmagini());
        $smarty->assign("miniDescr0"    , str_split($immobili[0]->getDescrizione(), 50)[0] . "[...]");
        $smarty->assign("miniDescr1"    , str_split($immobili[1]->getDescrizione(), 50)[0] . "[...]");
        $smarty->assign("miniDescr2"    , str_split($immobili[2]->getDescrizione(), 50)[0] . "[...]");
        $smarty->display("home.tpl");


    }
}