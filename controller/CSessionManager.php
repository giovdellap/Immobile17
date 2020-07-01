<?php


class CSessionManager
{
    public static function getUtenteLoggato()
    {
        $id = $_SESSION['id'];
        if ($id == 'AM1')
            return FPersistentManager::visualizzaAmministratore($id);
        else
            return FPersistentManager::visualizzaUtente($id);
    }

    public static function adminLogged(): bool
    {
        $id = $_SESSION['id'];
        if($id == 'AM1') return true;
        else return false;
    }

    public static function createSession(string $id)
    {
        ini_set('session.gc_maxlifetime', 3600);
        session_set_cookie_params(3600);
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            $_SESSION['id'] = $id;
        }
    }

    public static function sessionExists(): bool
    {
        if(session_status() == PHP_SESSION_NONE)
            session_start();
        $logged = false;
        if (isset($_COOKIE['PHPSESSID']))
            if (isset($_SESSION['id']))
                $logged = true;
        return $logged;
    }

    public static function sessionDestroy()
    {
        session_start();
        session_unset();
        session_destroy();
    }
}