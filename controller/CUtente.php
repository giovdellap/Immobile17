<?php


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
        if (VReceiverProxy::getRequest()) {
            if (CSessionManager::sessionExists())
                header('Location: '.$GLOBALS['path']);
            else
            {
                $senderProxy = VSenderProxy::getInstance();
                $senderProxy->setApi($api);
                $senderProxy->loginForm();
            }
        } elseif (VReceiverProxy::postRequest())
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
        $loginUser = VReceiverProxy::loginUser();
        $db_result = FPersistentManager::login($loginUser->getEmail(), $loginUser->getPassword());
        switch ($db_result) {

            case "OK ADMIN":
                CSessionManager::createSession("AM1");
                CAdmin::homepage();
                break;

            case "OK USER":
                CSessionManager::createSession(FPersistentManager::loadIDbyEMail($loginUser->getEmail()));
                header('Location: '.$GLOBALS['path']);
                break;

            case "WRONG EMAIL":
            case "WRONG PASSWORD":
                $senderProxy = VSenderProxy::getInstance();
            $senderProxy->setApi($api);

            $senderProxy->setError($db_result);
                $senderProxy->loginForm();
        }
    }

    /**
     * Effettua operazioni diverse in base al tipo di richiesta HTTP:
     * Metodo GET: Mostra la registration form
     * Metodo POST: Effettua la registrazione sul DB
     *              Nel caso vada a buon fine, lo comunica all'utente
     *              Nel caso non vada a buon fine, mostra all'utente la registration form con l'errore riscontrato
     * @throws \PHPMailer\PHPMailer\Exception
     */
    public static function registrazione(bool $api)
    {
        if (VReceiverProxy::getRequest())
        {
            $senderProxy = VSenderProxy::getInstance();
            $senderProxy->registrationForm();
        }
        else if (VReceiverProxy::postRequest()) {
            $utente = VReceiverProxy::registrationUser();
            $db_result = FPersistentManager::registrazione($utente);

            if ($db_result === "OK") {
                CSessionManager::createSession(FPersistentManager::loadIDbyEMail($utente->getEmail()));
                FPersistentManager::addMedia(VImageReceiver::uploadImage(CSessionManager::getUtenteLoggato()));
                self::confermationEmail(CSessionManager::getUtenteLoggato());

                $senderProxy = VSenderProxy::getInstance();
                $senderProxy->setApi($api);
                $senderProxy->setUtente(CSessionManager::getUtenteLoggato());
                $senderProxy->registrationOK();
            } else {
                $senderProxy = VSenderProxy::getInstance();
                $senderProxy->setApi($api);
                $senderProxy->setError($db_result);
                $senderProxy->setUtente($utente);
                $senderProxy->registrationForm();
            }
        } // ipotetico else
    }

    /**
     * Mostra all'utente il suo profilo se è loggato e la richiesta HTTP è POST
     * Mostra la login form altrimenti
     */
    public static function visualizzaProfilo(bool $api)
    {
        if (VReceiverProxy::getRequest()) {

            if (CSessionManager::sessionExists()) {
                $senderProxy = VSenderProxy::getInstance();
                $senderProxy->setApi($api);
                $senderProxy->setUtente(CSessionManager::getUtenteLoggato());
                $senderProxy->visualizzaProfilo();
            } else header('Location: '.$GLOBALS['path'].'Utente/login');
        } else header('Location: '.$GLOBALS['path']);


    }

    /**
     * Carica dal DB la lista appuntamenti dell'utente e gliela mostra
     */
    public static function calendario(bool $api)
    {
        if (VReceiverProxy::getRequest()) {
            if (CSessionManager::sessionExists()) {
                $utente = CSessionManager::getUtenteLoggato();
                $utente = FPersistentManager::visualizzaAppUtente($utente->getId());
                $appuntamenti = $utente->getListAppuntamenti();

                $senderProxy = VSenderProxy::getInstance();
                $senderProxy->setApi($api);
                $senderProxy->setUtente($utente);
                $senderProxy->showCalendario($appuntamenti);

            } else header('Location: '.$GLOBALS['path'].'Utente/login');
        } else header('Location: '.$GLOBALS['path']);

    }

    public static function logout(bool $api)
    {
        CSessionManager::sessionDestroy();
        header("Location: " . $GLOBALS['path']);
    }

    public static function eliminaAccount(bool $api)
    {
        if (VReceiverProxy::postRequest()) {
            if (CSessionManager::sessionExists()) {
                $utente = CSessionManager::getUtenteLoggato();
                CSessionManager::sessionDestroy();
                if (FPersistentManager::eliminaUtente($utente))
                    header('Location: ' . $GLOBALS['path']);
                else {
                    CSessionManager::createSession($utente->getId());
                    $senderProxy = VSenderProxy::getInstance();
                    $senderProxy->setApi($api);
                    $senderProxy->setError('ERRORE ELIMINAZIONE');
                    $senderProxy->eliminaAccount();
                }
            } else header('Location: '.$GLOBALS['path'].'Utente/login');
        }
        elseif (VReceiverProxy::getRequest())
        {
            if (CSessionManager::sessionExists())
            {
                $senderProxy = VSenderProxy::getInstance();
                $senderProxy->setApi($api);
                $senderProxy->setUtente(CSessionManager::getUtenteLoggato());
                $senderProxy->eliminaAccount();
            }  else header('Location: '.$GLOBALS['path'].'Utente/login');
        }
        //ipotetico else
    }

    public static function visualizzaAppuntamento(string $id, bool $api)
    {
        if (VReceiverProxy::getRequest()) {
            if (CSessionManager::sessionExists()) {
                $appuntamento = FPersistentManager::visualizzaAppuntamento($id);

                $senderProxy = VSenderProxy::getInstance();
                $senderProxy->setUtente(CSessionManager::getUtenteLoggato());
                $senderProxy->setApi($api);
                $senderProxy->visualizzaAppuntamento($appuntamento);
            } else header('Location: '.$GLOBALS['path'].'Utente/login');
        }
        else header('Location: '.$GLOBALS['path']);
    }

    public static function confermaAccount(array $parameters, bool $api)
    {
        if(VReceiverProxy::getRequest() && VReceiverProxy::confermaAccountValidator($parameters))
        {
            $cliente = FPersistentManager::visualizzaUtente(VReceiverProxy::getParametersId($parameters));
            $codice = VReceiverProxy::getParametersCode($parameters);
            echo('codice: '.$codice);

            if(FPersistentManager::confermaCodice($cliente, $codice))
            {
                $cliente->setAttivato(1);
                FPersistentManager::modificaUtente($cliente);
                header('Location: '.$GLOBALS['path'].'Utente/visualizzaProfilo');
            }
            else
            {
                $senderProxy =  VSenderProxy::getInstance();
                $senderProxy->setUtente($cliente);
                $senderProxy->setError('ATTIVAZIONE FALLITA');
                $senderProxy->setApi($api);
                $senderProxy->visualizzaProfilo();
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
    }

    public static function forgotPassword(bool $api)
    {
        if(VReceiverProxy::postRequest())
        {
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $password = substr(str_shuffle($permitted_chars), 0, 10);
            $utente = FPersistentManager::visualizzaUtente(
                FPersistentManager::loadIDbyEMail(VReceiverProxy::getEmail()));
            $utente->setPassword($password);
            FPersistentManager::modificaUtente($utente);
            CMail::sendForgotPasswordEmail($utente, $password);

        }
    }

    public static function modificaPassword(bool $api)
    {
        if(CSessionManager::sessionExists())
        {
            if(VReceiverProxy::getRequest())
            {
                $senderProxy = VSenderProxy::getInstance();
                $senderProxy->setApi($api);
                $senderProxy->setUtente(CSessionManager::getUtenteLoggato());
                $senderProxy->modificaPassword();
            }
            elseif (VReceiverProxy::postRequest())
            {
                $oldPassword = VReceiverProxy::getOldPW();
                $newPassword = VReceiverProxy::getNewPW();
                $utente = CSessionManager::getUtenteLoggato();
                if($utente->getPassword() === $oldPassword )
                {
                    $utente->setPassword($newPassword);
                    FPersistentManager::modificaUtente($utente);
                    header('Location: ' . $GLOBALS['path'] . 'Utente/visualizzaProfilo');
                }
                else
                {
                    $senderProxy = VSenderProxy::getInstance();
                    $senderProxy->setApi($api);
                    $senderProxy->setUtente($utente);
                    $senderProxy->setError('WRONG PASSWORD');
                    $senderProxy->modificaPassword();
                }
            }
            //ipotetico else
        }
        else header('Location: ' . $GLOBALS['path'] . 'Utente/login');

    }



}
