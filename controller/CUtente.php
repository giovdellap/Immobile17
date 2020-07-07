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
        if (VReceiverProxy::getRequest()) {
            if (CSessionManager::sessionExists())
                CHome::homepage();
            else VUtente::loginform(VSmartyFactory::basicSmarty());
        } elseif (VReceiverProxy::postRequest())
            self::checkLogin();
    }

    /**
     * Effettua un controllo sul DB dei parametri della richiesta HTTP POST
     * Effettua operazioni diverse in base alla risposta del DB:
     *  - OK ADMIN: Visualizza la homepage dell'Admin
     *  - OK USER: Visualizza la homepage
     *  - WRONG EMAIL/PASSWORD: visualizza la login form con un messaggio di errore
     * Nel caso il login vada a buon fine e l'utente non abbia una sessione attiva, la crea
     */
    public static function checkLogin()
    {
        $loginUser = VReceiverProxy::loginUser();
        $db_result = FPersistentManager::login($loginUser->getEmail(), $loginUser->getPassword());
        switch ($db_result) {

            case "OK ADMIN":
                CSessionManager::createSession("AM1");
                CAdmin::homepage();
                break;

            case "OK USER":
                $agenzia = FPersistentManager::visualizzaAgenzia('AZ1');
                $immobili = FPersistentManager::getImmobiliHomepage();
                CSessionManager::createSession(FPersistentManager::loadIDbyEMail($loginUser->getEmail()));
                $smarty = VSmartyFactory::userSmarty(CSessionManager::getUtenteLoggato());
                VHome::homepage($smarty, $agenzia, $immobili);
                break;

            case "WRONG EMAIL":
            case "WRONG PASSWORD":
                $smarty = VSmartyFactory::basicSmarty();
                VUtente::loginForm(VSmartyFactory::errorSmarty($smarty, $db_result));
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
    public static function registrazione()
    {
        if (VReceiverProxy::getRequest())
            VUtente::showRegistrationForm(VSmartyFactory::basicSmarty());

        else if (VReceiverProxy::postRequest()) {
            $utente = VReceiverProxy::registrationUser();
            $db_result = FPersistentManager::registrazione($utente);

            if ($db_result === "OK") {
                CSessionManager::createSession(FPersistentManager::loadIDbyEMail($utente->getEmail()));
                FPersistentManager::addMedia(VImageReceiver::uploadImage(CSessionManager::getUtenteLoggato()));
                self::confermationEmail(CSessionManager::getUtenteLoggato());
                VUtente::registrationOK(VSmartyFactory::userSmarty(CSessionManager::getUtenteLoggato()));
            } else {
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
        if (VReceiverProxy::getRequest()) {
            if (CSessionManager::sessionExists()) {
                $utente = CSessionManager::getUtenteLoggato();
                VUtente::visualizzaProfilo(VSmartyFactory::userSmarty($utente));
            } else VUtente::loginForm(VSmartyFactory::basicSmarty());
        }// ipotetico else
    }

    /**
     * Carica dal DB la lista appuntamenti dell'utente e gliela mostra
     */
    public static function calendario()
    {
        if (VReceiverProxy::getRequest()) {
            if (CSessionManager::sessionExists()) {
                $utente = CSessionManager::getUtenteLoggato();
                $utente = FPersistentManager::visualizzaAppUtente($utente->getId());
                $appuntamenti = $utente->getListAppuntamenti();
                VUtente::showCalendario(VSmartyFactory::userSmarty($utente), $appuntamenti);
            } else VUtente::loginForm(VSmartyFactory::basicSmarty());
        }// ipotetico else
    }

    public static function logout()
    {
        CSessionManager::sessionDestroy();
        header("Location: " . $GLOBALS['path']);
    }

    public static function eliminaAccount()
    {
        if (VReceiverProxy::postRequest()) {
            if (CSessionManager::sessionExists()) {
                $utente = CSessionManager::getUtenteLoggato();
                CSessionManager::sessionDestroy();
                if (FPersistentManager::eliminaUtente($utente))
                    header('Location: ' . $GLOBALS['path']);
                else {
                    CSessionManager::createSession($utente->getId());
                    VUtente::eliminaAccount(VSmartyFactory::errorSmarty(VSmartyFactory::userSmarty($utente), 'ERRORE ELIMINAZIONE'));
                }
            } else VUtente::loginForm(VSmartyFactory::basicSmarty());
        } elseif (VReceiverProxy::getRequest()) {
            if (CSessionManager::sessionExists()) {
                $utente = CSessionManager::getUtenteLoggato();
                VUtente::eliminaAccount(VSmartyFactory::userSmarty($utente));
            } else VUtente::loginForm(VSmartyFactory::basicSmarty());
        }
        //ipotetico else
    }

    public static function visualizzaAppuntamento(string $id)
    {
        if (VReceiverProxy::getRequest()) {
            if (CSessionManager::sessionExists()) {
                $utente = CSessionManager::getUtenteLoggato();
                $appuntamento = FPersistentManager::visualizzaAppuntamento($id);
                VUtente::showAppuntamento(VSmartyFactory::userSmarty($utente), $appuntamento);
            } else VUtente::loginForm(VSmartyFactory::basicSmarty());
        }
        else header('Location: '.$GLOBALS['path']);
    }

    public static function confermaAccount(array $parameters)
    {
        if(VReceiverProxy::getRequest() && VReceiverProxy::confermaAccountValidator($parameters))
        {
            $cliente = FPersistentManager::visualizzaUtente(VReceiverProxy::getParametersId($parameters));
            $smarty = VSmartyFactory::userSmarty($cliente);
            $codice = VReceiverProxy::getParametersCode($parameters);
            echo('codice: '.$codice);

            if(FPersistentManager::confermaCodice($cliente, $codice))
            {
                $cliente->setAttivato(1);
                FPersistentManager::modificaUtente($cliente);
            }
            else $smarty = VSmartyFactory::errorSmarty($smarty, "ATTIVAZIONE FALLITA");

            VUtente::visualizzaProfilo($smarty);

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
        echo ("cacca: ".CMail::sendConfermationEmail($cliente, $code));
    }



}
