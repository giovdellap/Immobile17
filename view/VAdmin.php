<?php

/**
 * Class VAdmin
 * Si occupa di visualizzare tramite Smarty le pagine dell'Admin
 * @author Della Pelle - Di Domenica - Foderà
 * @package controller
 */
class VAdmin
{
    /**
     * @param Smarty $smarty
     * @param array $immobili
     * @param array $clienti
     * @param array $agenti
     * @param array $appuntamenti
     * @throws SmartyException
     */
    public static function showHomepage(Smarty $smarty, array $immobili, array $clienti, array $agenti, array $appuntamenti)
    {
        $smarty->assign('numAppWeek', count($appuntamenti));
        $smarty->assign('immobili', $immobili);
        $smarty->assign('clienti',$clienti);
        $smarty->assign('agenti', $agenti);
        $smarty->assign('toAppend', 'adminDashboard.tpl');
        $smarty->display('adminPage.tpl');
    }

    /**
     * @param Smarty $smarty
     * @throws SmartyException
     */
    public static function showPasswordAdmin(Smarty $smarty)
    {
        $smarty->assign('toAppend', 'adminModificaPassword.tpl');
        $smarty->display('adminPage.tpl');
    }

    /**
     * @param Smarty $smarty
     * @param array $immobili
     * @throws SmartyException
     */
    public static function showImmobili(Smarty $smarty,array $immobili)
    {
        $smarty->assign('immobili', $immobili);
        $smarty->assign('toAppend', 'listaImmobili.tpl');
        $smarty->display('adminPage.tpl');
    }

    /**
     * @param Smarty $smarty
     * @param $immobile
     * @throws SmartyException
     */
    public static function showImmobile(Smarty $smarty, $immobile)
    {
        $smarty->assign('immobile', $immobile);
        $smarty->display('immobileAdmin.tpl');
    }

    /**
     * @param Smarty $smarty
     * @param array $clienti
     * @throws SmartyException
     */
    public static function showClienti(Smarty $smarty, array $clienti)
    {
        $smarty->assign('clienti', $clienti);
        $smarty->assign('toAppend', 'listaClienti.tpl');
        $smarty->display('adminPage.tpl');
    }

    /**
     * @param Smarty $smarty
     * @param array $agenti
     * @throws SmartyException
     */
    public static function showAgenti(Smarty $smarty, array $agenti)
    {
        $smarty->assign('agenti', $agenti);
        $smarty->assign('toAppend', 'listaAgenti.tpl');
        $smarty->display('adminPage.tpl');
    }

    /**
     * @param Smarty $smarty
     * @param MAgenzia $agenzia
     * @throws SmartyException
     */
    public static function showAgenzia(Smarty $smarty, MAgenzia $agenzia)
    {
        $smarty->assign('agenzia', $agenzia);
        $smarty->assign('toAppend', 'visualizzaAgenzia.tpl');
        $smarty->display('adminPage.tpl');
    }

    /**
     * @param Smarty $smarty
     * @throws SmartyException
     */
    public static function showAggiuntaImmobile(Smarty $smarty)
    {
        $smarty->assign('toAppend','adminAggiuntaImmobile.tpl' );
        $smarty->display('adminPage.tpl');
    }

    /**
     * @param Smarty $smarty
     * @param MImmobile $immobile
     * @throws SmartyException
     */
    public static function showModificaImmobile(Smarty $smarty, MImmobile $immobile)
    {
        $smarty->assign('immobile', $immobile);
        $smarty->assign('tipologie', VSmartyFactory::listTipologie($immobile->getTipologia()));
        $smarty->assign('tipoAnnuncio', VSmartyFactory::listTipoAnnuncio($immobile->getTipoAnnuncio()));
        $smarty->assign('toAppend','adminModificaImmobile.tpl' );
        $smarty->display('adminPage.tpl');
    }

    /**
     * @param Smarty $smarty
     * @param MUtente $utente
     * @throws SmartyException
     */
    public static function showModificaUtente(Smarty $smarty, MUtente $utente)
    {
        $smarty->assign('utente', $utente);
        $smarty->assign('toAppend','adminModificaUtente.tpl' );
        $smarty->display('adminPage.tpl');
    }

    /**
     * @param Smarty $smarty
     * @throws SmartyException
     */
    public static function showAggiuntaUtente(Smarty $smarty)
    {
        $smarty->assign('toAppend','adminAggiuntaUtente.tpl' );
        $smarty->display('adminPage.tpl');
    }

    /**
     * @param Smarty $smarty
     * @param array $appuntamenti
     * @throws SmartyException
     */
    public static function showAppuntamenti(Smarty $smarty, array $appuntamenti)
    {
        $smarty->assign('appuntamenti', $appuntamenti);
        $smarty->assign('toAppend','listaAppuntamenti.tpl' );
        $smarty->display('adminPage.tpl');
    }

    /**
     * @param Smarty $smarty
     * @param array $clienti
     * @param array $immobili
     * @throws SmartyException
     */
    public static function aggiuntaAppParameters(Smarty $smarty, array $clienti, array $immobili)
    {
        $smarty->assign('clienti', $clienti);
        $smarty->assign('immobili', $immobili);
        $smarty->assign('toAppend','adminParametriAppuntamento.tpl' );
        $smarty->display('adminPage.tpl');
    }

    /**
     * @param Smarty $smarty
     * @param array $appLiberi
     * @param MCliente $cliente
     * @param MImmobile $immobile
     * @throws SmartyException
     */
    public static function showCalendarioAppuntamento(Smarty $smarty, array $appLiberi, MCliente $cliente, MImmobile $immobile)
    {
        $smarty->assign("appLiberi", $appLiberi);
        $smarty->assign('cliente', $cliente);
        $smarty->assign('immobile', $immobile);
        $smarty->assign('toAppend','adminCalendario.tpl' );
        $smarty->display('adminPage.tpl');
    }
}