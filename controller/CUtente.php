<?php


class CUtente
{
    public static function login()
    {
        if($_SERVER['REQUEST_METHOD'] == "GET") {
            if(self::isLogged())
                CHome::homepage();
            else VUtente::loginform();
        }
        elseif ($_SERVER['REQUEST_METHOD'] == "POST")
            self::checkLogin();
    }

    public static function checkLogin()
    {
        $db_result = FPersistentManager::login($_POST['email'], $_POST['password']);
        switch ($db_result) {
            case "OK ADMIN":
                if (session_status() == PHP_SESSION_NONE){
                    session_start();
                    $_SESSION['utente'] = "AM1";
                    CAdmin::adminHomepage();
                }
                else CAdmin::adminHomepage();
                break;

            case "OK USER":
                if (session_status() == PHP_SESSION_NONE){
                    session_start();
                    $_SESSION['utente'] = FPersistentManager::loadIDbyEMail($_POST['email']);
                    CHome::homepage();
                }
                else CHome::homepage();
                break;

            case "WRONG EMAIL":
            case "WRONG PASSWORD":
                CUtente::wrongLogin($db_result);
        }
    }
    public static function isLogged()
    {
        $logged = false;
        if (isset($_COOKIE['PHPSESSID'])) {
            if (session_status() == PHP_SESSION_NONE) {
                //header('Cache-Control: no cache'); //no cache
                //session_cache_limiter('private_no_expire'); // works
                //session_cache_limiter('public'); // works too
                session_start();
            }
        }
        if (isset($_SESSION['utente'])) {
            $logged = true;
        }
        return $logged;
    }

    public static function wrongLogin(string $error)
    {
        //TO DO
    }
}