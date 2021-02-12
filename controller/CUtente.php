<?php

/**
 * Class CUtente
 * Contiene metodi per le operazioni che riguardano l'utente(visualizzazione profilo, modifica profilo, visualizzazione calendario appuntamenti)
 * @author Della Pelle - Di Domenica - Foderà
 * @package controller
 */
class CUtente
{
    /**
     * Funzione che effettua operazioni diverse in base al tipo di richiesta HTTP:
     *  - GET: Visualizza la loginForm se l'utente non è loggato, rimanda all'homepage altrimenti
     *  - POST: Passa alla funzione checkLogin()
     * @param bool $api
     */
    public static function login(bool $api)
    {
        if (VReceiver::getRequest()) {
            if (CSessionManager::sessionExists())
                header('Location: '.$GLOBALS['path']);
            else
            {
                $sender = VSenderAdapter::getInstance();
                $sender->setApi($api);
                $sender->loginForm();
            }
        } elseif (VReceiver::postRequest())
            self::checkLogin($api);
    }

    /**
     * Effettua un controllo sul DB dei parametri della richiesta HTTP POST
     * Effettua operazioni diverse in base alla risposta del DB:
     *  - OK ADMIN: Visualizza la homepage dell'Admin
     *  - OK USER: Visualizza la homepage
     *  - WRONG EMAIL/PASSWORD: visualizza la login form con un messaggio di errore
     * Nel caso il login vada a buon fine e l'utente non abbia una sessione attiva, la crea
     * @param bool $api
     */
    public static function checkLogin(bool $api)
    {
        $loginUser = VReceiver::loginUser();
        $db_result = FPersistentManager::login($loginUser->getEmail(), $loginUser->getPassword());
        switch ($db_result) {
            case "OK ADMIN":
                CSessionManager::createSession("AM1");
                CAdmin::homepage();
                break;

            case "OK USER":
                CSessionManager::createSession(FPersistentManager::loadIDbyEMail($loginUser->getEmail()));
                if($api)
                {
                    $token = self::tokenCreator("API");
                    FPersistentManager::storeToken(CSessionManager::getUtenteLoggato()->getId(), $token, "API");
                    CSessionManager::tokenValidation($token, "API");
                    $sender = VSenderAdapter::getInstance();
                    $sender->setApi($api);
                    $sender->setUtente(CSessionManager::getUtenteLoggato());
                    $sender->sendToken($token);
                }
                else {
                    if(VReceiver::rememberMe())
                        self::cookieCreator();
                    header('Location: ' . $GLOBALS['path']);
                }
                break;

            case "WRONG EMAIL":
            case "WRONG PASSWORD":
                $sender = VSenderAdapter::getInstance();
                $sender->setApi($api);
                $sender->setError($db_result);
                $sender->loginForm();
        }
    }

    /**
     * Effettua operazioni diverse in base al tipo di richiesta HTTP:
     * Metodo GET: Mostra la registration form
     * Metodo POST: Effettua la registrazione sul DB
     *              Nel caso vada a buon fine, lo comunica all'utente
     *              Nel caso non vada a buon fine, mostra all'utente la registration form con l'errore riscontrato
     * @param bool $api
     * @throws \PHPMailer\PHPMailer\Exception
     */
    public static function registrazione(bool $api)
    {
        if (VReceiver::getRequest())
        {
            $sender = VSenderAdapter::getInstance();
            $sender->setApi($api);
            $sender->registrationForm();
        }
        else if (VReceiver::postRequest()) {
            $utente = VReceiver::registrationUser();
            $db_result = FPersistentManager::registrazione($utente);

            if ($db_result === "OK") {
                CSessionManager::createSession(FPersistentManager::loadIDbyEMail($utente->getEmail()));
                if(VImageReceiver::imgIsUploaded())
                    FPersistentManager::addMedia(VImageReceiver::uploadImage(CSessionManager::getUtenteLoggato()));
                self::confermationEmail(CSessionManager::getUtenteLoggato());

                $sender = VSenderAdapter::getInstance();
                $sender->setApi($api);
                $sender->setUtente(CSessionManager::getUtenteLoggato());
                $sender->registrationOK();
            } else {
                $sender = VSenderAdapter::getInstance();
                $sender->setApi($api);
                $sender->setError($db_result);
                $sender->setUtente($utente);
                $sender->registrationForm();
            }
        } // ipotetico else
    }

    /**
     * Mostra all'utente il suo profilo se è loggato e la richiesta HTTP è POST
     * Mostra la login form altrimenti
     * @param bool $api
     */
    public static function visualizzaProfilo(bool $api)
    {
        if (VReceiver::getRequest()) {

            if (CSessionManager::sessionExists()) {
                $sender = VSenderAdapter::getInstance();
                $sender->setApi($api);
                $sender->setUtente(CSessionManager::getUtenteLoggato());
                $sender->visualizzaProfilo();
            } else header('Location: '.$GLOBALS['path'].'Utente/login');
        } else header('Location: '.$GLOBALS['path']);
    }

    public static function cambiaImmagineProfilo()
    {
        if (VReceiver::postRequest())
        {
            if(CSessionManager::sessionExists())
            {
                if((CSessionManager::getUtenteLoggato()->getImmagine()) !=null)
                    if(VImageReceiver::imgIsUploaded())
                        $oldImgId=CSessionManager::getUtenteLoggato()->getId();
                        FPersistentManager::removeMedia($oldImgId);
                        FPersistentManager::addMedia(VImageReceiver::uploadImage(CSessionManager::getUtenteLoggato()));

            }

            } header('Location: '.$GLOBALS['path'].'Utente/visualizzaProfilo');

        }

    /**
     * Carica dal DB la lista appuntamenti dell'utente e gliela mostra
     * @param bool $api
     */
    public static function calendario(bool $api)
    {
        if (VReceiver::getRequest()) {
            if (CSessionManager::sessionExists()) {
                $utente = CSessionManager::getUtenteLoggato();
                $utente = FPersistentManager::visualizzaAppUtente($utente->getId());
                $appuntamenti = $utente->getListAppuntamenti();

                $sender = VSenderAdapter::getInstance();
                $sender->setApi($api);
                $sender->setUtente($utente);
                $sender->showCalendario($appuntamenti);

            } else header('Location: '.$GLOBALS['path'].'Utente/login');
        } else header('Location: '.$GLOBALS['path']);

    }

    public static function logout(bool $api)
    {
        if(VReceiver::isSetCookie())
            setcookie('token', '0', time()-3600, $GLOBALS['path']);
        CSessionManager::sessionDestroy();
        header("Location: " . $GLOBALS['path']);
    }

    public static function eliminaAccount(bool $api)
    {
        if (VReceiver::postRequest()) {
            if (CSessionManager::sessionExists()) {
                $utente = CSessionManager::getUtenteLoggato();
                CSessionManager::sessionDestroy();
                if (FPersistentManager::eliminaUtente($utente))
                    header('Location: ' . $GLOBALS['path']);
                else {
                    CSessionManager::createSession($utente->getId());
                    $sender = VSenderAdapter::getInstance();
                    $sender->setApi($api);
                    $sender->setError('ERRORE ELIMINAZIONE');
                    $sender->eliminaAccount();
                }
            } else header('Location: '.$GLOBALS['path'].'Utente/login');
        }
        elseif (VReceiver::getRequest())
        {
            if (CSessionManager::sessionExists())
            {
                $sender = VSenderAdapter::getInstance();
                $sender->setApi($api);
                $sender->setUtente(CSessionManager::getUtenteLoggato());
                $sender->eliminaAccount();
            }  else header('Location: '.$GLOBALS['path'].'Utente/login');
        }
        //ipotetico else
    }

    public static function visualizzaAppuntamento(string $id, bool $api)
    {
        if (VReceiver::getRequest()) {
            if (CSessionManager::sessionExists()) {
                $appuntamento = FPersistentManager::visualizzaAppuntamento($id);

                $sender = VSenderAdapter::getInstance();
                $sender->setUtente(CSessionManager::getUtenteLoggato());
                $sender->setApi($api);
                $sender->visualizzaAppuntamento($appuntamento);
            } else header('Location: '.$GLOBALS['path'].'Utente/login');
        }
        else header('Location: '.$GLOBALS['path']);
    }

    public static function confermaAccount(array $parameters, bool $api)
    {
        if(VReceiver::getRequest() && VReceiver::confermaAccountValidator($parameters))
        {
            $cliente = FPersistentManager::visualizzaUtente(VReceiver::getParametersId($parameters));
            $codice = VReceiver::getParametersCode($parameters);

            if(FPersistentManager::confermaCodice($cliente, $codice))
            {
                $cliente->setAttivato(1);
                FPersistentManager::modificaUtente($cliente);
                header('Location: '.$GLOBALS['path'].'Utente/visualizzaProfilo');
            }
            else
            {
                $sender =  VSenderAdapter::getInstance();
                $sender->setUtente($cliente);
                $sender->setError('ATTIVAZIONE FALLITA');
                $sender->setApi($api);
                $sender->visualizzaProfilo();
            }
        }
    }

    /**
     * @param MCliente $cliente
     * @throws \PHPMailer\PHPMailer\Exception
     */
    private static function confermationEmail(MCliente $cliente)
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = substr(str_shuffle($permitted_chars), 0, 10);
        FPersistentManager::addCodice($cliente, $code);
        CMail::sendConfermationEmail(CSessionManager::getUtenteLoggato(), $code);
    }

    public static function forgotPassword(bool $api)
    {
        if(VReceiver::postRequest())
        {
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $password = substr(str_shuffle($permitted_chars), 0, 10);
            $utente = FPersistentManager::visualizzaUtente(
                FPersistentManager::loadIDbyEMail(VReceiver::getEmail()));
            $utente->setPassword($password);
            FPersistentManager::modificaUtente($utente);
            CMail::sendForgotPasswordEmail($utente, $password);

            $sender = VSenderAdapter::getInstance();
            $sender->setApi($api);
            $sender->forgotPassword();
        }
        elseif(VReceiver::getRequest())
        {
            $sender = VSenderAdapter::getInstance();
            $sender->setApi($api);
            $sender->forgotPasswordForm();
        }
    }

    public static function modificaPassword(bool $api)
    {
        if(CSessionManager::sessionExists())
        {
            if(VReceiver::getRequest())
            {
                $sender = VSenderAdapter::getInstance();
                $sender->setApi($api);
                $sender->setUtente(CSessionManager::getUtenteLoggato());
                $sender->modificaPassword();
            }
            elseif (VReceiver::postRequest())
            {
                $oldPassword = VReceiver::getOldPW();
                $newPassword = VReceiver::getNewPW();
                $utente = CSessionManager::getUtenteLoggato();
                if(password_verify($oldPassword, $utente->getPassword()))
                {
                    $utente->setPassword($newPassword);
                    FPersistentManager::modificaUtente($utente);
                    header('Location: ' . $GLOBALS['path'] . 'Utente/visualizzaProfilo');
                }
                else
                {
                    $sender = VSenderAdapter::getInstance();
                    $sender->setApi($api);
                    $sender->setUtente($utente);
                    $sender->setError('WRONG PASSWORD');
                    $sender->modificaPassword();
                }
            }
            //ipotetico else
        }
        else header('Location: ' . $GLOBALS['path'] . 'Utente/login');

    }

    private static function tokenCreator(string $type): string
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($permitted_chars), 0, 15);
    }

    private static function cookieCreator()
    {
        $token = self::tokenCreator("COOKIE");
        $expiration_time = time() + (30*24*60*60);
        FPersistentManager::storeToken(CSessionManager::getUtenteLoggato()->getId(), $token, "COOKIE");
        setcookie('token', $token, $expiration_time, $GLOBALS['path']);
    }

}
