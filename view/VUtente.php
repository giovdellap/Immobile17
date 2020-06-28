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
        // TO DO
    }

    public static function visualizzaProfilo(Smarty $smarty)
    {
        //TO DO
    }

    public static function showCalendario(Smarty $smarty, array $appuntamenti)
    {
        // TO DO
    }

}