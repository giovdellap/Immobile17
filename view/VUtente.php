<?php

/**
 * Class VUtente
 * Si occupa di viusalizzare tramite Smarty le pagine relative agli Utenti
 * @author Della Pelle - Di Domenica - Foderà
 * @package controller
 */
class VUtente
{
    /**
     * @param Smarty $smarty
     * @throws SmartyException
     */
    public static function loginForm(Smarty $smarty)
    {
        $smarty->display('login.tpl');
    }

    /**
     * @param Smarty $smarty
     * @throws SmartyException
     */
    public static function showRegistrationForm(Smarty $smarty)
    {
        $smarty->display("registrazione.tpl");
    }

    /**
     * @param Smarty $smarty
     * @throws SmartyException
     */
    public static function registrationOK(Smarty $smarty)
    {
        $smarty->display("registrazioneOk.tpl");
    }

    /**
     * @param Smarty $smarty
     * @throws SmartyException
     */
    public static function visualizzaProfilo(Smarty $smarty)
    {
        $smarty->display("profilo.tpl");
    }

    /**
     * @param Smarty $smarty
     * @param MUtente $utente
     * @throws SmartyException
     */
    public static function showModificaUtente(Smarty $smarty, MUtente $utente)
    {
        $smarty->assign('utente', $utente);
        $smarty->display("modificaDati.tpl");
    }

    /**
     * @param Smarty $smarty
     * @throws SmartyException
     */
    public static function eliminaAccount(Smarty $smarty)
    {
        $smarty->display("eliminaAccount.tpl");
    }

    /**
     * @param Smarty $smarty
     * @param array $appuntamenti
     * @throws SmartyException
     */
    public static function showCalendario(Smarty $smarty, array $appuntamenti)
    {
        $smarty->assign('appuntamenti', $appuntamenti);
        $smarty->assign('today', MData::getToday());
        $smarty->display('calendarioUtente.tpl');
    }

    /**
     * @param Smarty $smarty
     * @param MAppuntamento $appuntamento
     * @param string $userType
     * @throws SmartyException
     */
    public static function showAppuntamento(Smarty $smarty, MAppuntamento $appuntamento, string $userType)
    {
        $smarty->assign('appuntamento', $appuntamento);
        $smarty->assign('immobile', $appuntamento->getImmobile());
        $smarty->assign('userType', $userType);
        $smarty->assign('agente', $appuntamento->getAgenteImmobiliare());
        $smarty->assign('cliente', $appuntamento->getCliente());
        $smarty->display('paginaAppuntamento.tpl');
    }

    /**
     * @param Smarty $smarty
     * @throws SmartyException
     */
    public static function showModificaPassword(Smarty $smarty)
    {
        $smarty->display('modificaPassword.tpl');
    }

    /**
     * @param Smarty $smarty
     * @throws SmartyException
     */
    public static function showForgotPassword(Smarty $smarty)
    {
        $smarty->display('invioEmailRecuperoPwd.tpl');
    }

    /**
     * @param Smarty $smarty
     * @throws SmartyException
     */
    public static function formForgotPassword(Smarty $smarty)
    {
        $smarty->display('forgotPassword.tpl');
    }

}