<?php


class VUtente
{
    public static function loginForm(Smarty $smarty)
    {
        $smarty->display('login.tpl');
    }

    public static function showRegistrationForm(Smarty $smarty)
    {
        // TO DO
        // Viene passato un utente già assegnato dentro smarty
        // se è visitatore, pagina base, sennò riempi già i campi con i valori dell'utente passato
        $smarty->display("registrazione.tpl");
    }

    public static function registrationOK(Smarty $smarty)
    {
        $smarty->display("registrazioneOk.tpl");
    }

    public static function visualizzaProfilo(Smarty $smarty)
    {
        $smarty->display("profilo.tpl");
    }

    public static function showModificaUtente(Smarty $smarty, MUtente $utente)
    {
        $smarty->assign('utente', $utente);
        $smarty->display("modificaDati.tpl");
    }

    public static function eliminaAccount(Smarty $smarty)
    {
        $smarty->display("eliminaAccount.tpl");
    }

    public static function showCalendario(Smarty $smarty, array $appuntamenti)
    {
        $smarty->assign('appuntamenti', $appuntamenti);
        $smarty->assign('today', MData::getToday());
        $smarty->display('calendarioUtente.tpl');
    }

    public static function showAppuntamento(Smarty $smarty, MAppuntamento $appuntamento, string $userType)
    {
        $smarty->assign('appuntamento', $appuntamento);
        $smarty->assign('immobile', $appuntamento->getImmobile());
        $smarty->assign('userType', $userType);
        $smarty->assign('agente', $appuntamento->getAgenteImmobiliare());
        $smarty->assign('cliente', $appuntamento->getCliente());
        $smarty->display('paginaAppuntamento.tpl');

    }

    public static function showModificaPassword(Smarty $smarty)
    {
        $smarty->display('modificaPassword.tpl');
    }

    public static function showForgotPassword(Smarty $smarty)
    {
        $smarty->display('invioEmailRecuperoPwd.tpl');
    }

    public static function formForgotPassword(Smarty $smarty)
    {
        $smarty->display('forgotPassword.tpl');
    }

}