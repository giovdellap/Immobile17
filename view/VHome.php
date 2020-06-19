<?php


class VHome
{
    public static function homepage (MUtente $utente, MAgenzia $agenzia, array $immobili)
    {
        $smarty = StartSmarty::configuration();
        $smarty->assign("utente", $utente);
        $smarty->assign("nomeutente", $utente->getNome() . $utente->getCognome());
        self::viewHomepage($smarty, $agenzia, $immobili);


    }

    public static function visitorsHomepage(MAgenzia $agenzia, array $immobili)
    {
        $smarty = StartSmarty::configuration();
        self::viewHomepage($smarty, $agenzia, $immobili);
    }

    public static function viewHomepage($smarty, MAgenzia $agenzia, array $immobili)
    {
        $smarty->assign("path"          , $GLOBALS["path"]);
        $smarty->assign("agenzia"       , $agenzia);
        $smarty->assign("immobile0"     , $immobili[0]);
        $smarty->assign("immobile1"     , $immobili[1]);
        $smarty->assign("immobile2"     , $immobili[2]);
        $smarty->assign("imgSlide1"     , $agenzia->getImmagini()[0]) ; //slide immagini home da agenzia
        $smarty->assign("imgSlide2"     , $agenzia->getImmagini()[1]) ; //slide immagini home da agenzia
        $smarty->assign("imgSlide3"     , $agenzia->getImmagini()[2]) ; //slide immagini home da agenzia
        $smarty->assign("imgTop1"       , $immobili[0]->getImmagini());
        $smarty->assign("imgTop2"       , $immobili[1]->getImmagini());
        $smarty->assign("imgTop3"       , $immobili[2]->getImmagini());
        $smarty->assign("miniDescr0"    , str_split($immobili[0]->getDescrizione(), 50) . "[...]");
        $smarty->assign("miniDescr1"    , str_split($immobili[1]->getDescrizione(), 50) . "[...]");
        $smarty->assign("miniDescr2"    , str_split($immobili[2]->getDescrizione(), 50) . "[...]");
    }
}