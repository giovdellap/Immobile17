<?php


class CUtente
{
    /**
     * Funzione che effettua operazioni diverse in base al tipo di richiesta HTTP:
     *  - GET: Visualizza la loginForm se l'utente non è loggato, rimanda all'homepage altrimenti
     *  - POST: Passa alla funzione checkLogin()
     */
    public static function login()
    {
        if($_SERVER['REQUEST_METHOD'] == "GET") {
            if(self::isLogged())
                CHome::homepage();
            else VUtente::loginform(VSmartyFactory::basicSmarty());
        }
        elseif ($_SERVER['REQUEST_METHOD'] == "POST")
            self::checkLogin();
    }

    /**
     * Effettua un controllo sul DB dei parametri della richiesta HTTP POST
     * Effettua operazioni diverse in base alla risposta del DB:
     *  - OK ADMIN: Visualizza la homepage dell'Admin
     *  - OK USER: Visualizza la homepage
     *  - WRONGEMAIL/PASSWORD: visualizza la login form con un messaggio di errore
     * Nel caso il login vada a buon fine e l'utente non abbia una sessione attiva, la crea
     */
    public static function checkLogin()
    {
        $db_result = FPersistentManager::login($_POST['email'], $_POST['password']);
        print_r($db_result);
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
                $agenzia = FPersistentManager::visualizzaAgenzia('AZ1');
                $immobili = FPersistentManager::getImmobiliHomepage();
                if (session_status() == PHP_SESSION_NONE){
                    session_start();
                    $_SESSION['id'] = FPersistentManager::loadIDbyEMail($_POST['email']);
                    $smarty = VSmartyFactory::userSmarty(CSessionManager::getUtenteLoggato());
                    VHome::homepage($smarty, $agenzia, $immobili);
                }
                else VHome::homepage(VSmartyFactory::basicSmarty(), $agenzia, $immobili);
                break;

            case "WRONG EMAIL":
            case "WRONG PASSWORD":
                $smarty = VSmartyFactory::basicSmarty();
                VUtente::loginForm(VSmartyFactory::errorSmarty($smarty, $db_result));
        }
    }

    /**
     * Ritorna un booleano vero o falso a seconda che l'utente sia loggato o meno
     * @return bool
     */
    public static function isLogged(): bool
    {
        $logged = false;
        if (isset($_COOKIE['PHPSESSID'])) {
            if (session_status() == PHP_SESSION_NONE) {
                //header('Cache-Control: no cache'); //no cache
                //session_cache_limiter('private_no_expire'); // works
                //session_cache_limiter('public'); // works too
                session_start();
            }

            if (isset($_SESSION['utente'])) {
                $logged = true;
            }
        }
        return $logged;
    }

    /**
     * Effettua operazioni diverse in base al tipo di richiesta HTTP:
     * Metodo GET: Mostra la registration form
     * Metodo POST: Effettua la registrazione sul DB
     *              Nel caso vada a buon fine, lo comunica all'utente
     *              Nel caso non vada a buon fine, mostra all'utente la registration form con l'errore riscontrato
     */
    public static function registrazione()
    {
        if($_SERVER['REQUEST_METHOD'] == "GET")
            VUtente::showRegistrationForm(VSmartyFactory::basicSmarty());

        else if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $utente = new MCliente();
            $utente->setNome($_POST['nome']);
            $utente->setCognome($_POST['cognome']);
            $utente->setEmail($_POST['email']);
            $utente->setPassword($_POST['password']);
            $utente->setDataNascita(self::getDateFromRegistrazione());
            $utente->setIscrizione(MData::getCurrentTime());
            $utente->setAttivato(FALSE);
            $db_result = FPersistentManager::registrazione($utente);
            if($db_result === "OK")
            {
                if (session_status() == PHP_SESSION_NONE)
                {
                    session_start();
                    $_SESSION['utente'] = FPersistentManager::loadIDbyEMail($_POST['email']);
                }
                VUtente::registrationOK(VSmartyFactory::userSmarty(CSessionManager::getUtenteLoggato()));

            }
            else
            {
                $smarty = VSmartyFactory::userSmarty($utente);
                VUtente::showRegistrationForm(VSmartyFactory::errorSmarty($smarty, $db_result));
            }
        } // ipotetico else
    }

    /**
     * Mostra all'utente il suo profilo se è loggato e la richiesta HTTP è POST
     * Mostra la login form altrimenti
     */
    public static function visualizzaProfilo()
    {
        if($_SERVER['REQUEST_METHOD'] == "GET") {
            if (self::isLogged()) {
                $utente = CSessionManager::getUtenteLoggato();
                VUtente::visualizzaProfilo(VSmartyFactory::userSmarty($utente));
            }
            else VUtente::loginForm(VSmartyFactory::basicSmarty());
        }// ipotetico else
    }

    /**
     * Carica dal DB la lista appuntamenti dell'utente e gliela mostra
     */
    public static function calendario()
    {
        if($_SERVER['REQUEST_METHOD'] == "GET") {
            if (self::isLogged()) {
                $utente = CSessionManager::getUtenteLoggato();
                $utente = FPersistentManager::visualizzaAppUtente($utente->getId());
                $appuntamenti = $utente->getListAppuntamenti();
                VUtente::showCalendario(VSmartyFactory::userSmarty($utente), $appuntamenti);
            }
            else VUtente::loginForm(VSmartyFactory::basicSmarty());
        }// ipotetico else
    }

    public static function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        $agenzia = FPersistentManager::visualizzaAgenzia('AZ1');
        $immobili = FPersistentManager::getImmobiliHomepage();
        //VHome::homepage(VSmartyFactory::basicSmarty(), $agenzia, $immobili);
        header("Location: " . $GLOBALS['path']);
    }

    private static function getDateFromRegistrazione(): MData
    {
        $date=explode("-", $_POST["date"]);

        return new MData($date[0],$date[1],$date[2], 0);
    }
}