<?php

/**
 * Class CSessionManager
 * Contiene metodi per la gestione delle sessioni(creazione, caricamento utente, verifica admin loggato, distruzione) e dei token
 * Le sessioni contengono esclusivamente un parametro id coontenente l'id dell'utente
 * @author Della Pelle - Di Domenica - Foderà
 * @package controller
 */
class CSessionManager
{
    /**
     * Ritorna l'utente/amministratore il cui id è presente come parametro della sessione
     * @return MAmministratore|MUtente|null
     */
    public static function getUtenteLoggato()
    {
        $id = $_SESSION['id'];
        if ($id == 'AM1')
            return FPersistentManager::visualizzaAmministratore($id);
        else
            return FPersistentManager::visualizzaUtente($id);
    }

    /**
     * Ritorna un booleano true/false a seconda che l'admin sia loggato o meno
     * @return bool
     */
    public static function adminLogged(): bool
    {
        $id = $_SESSION['id'];
        if($id == 'AM1') return true;
        else return false;
    }

    /**
     * Crea una sessione della durata di 1h con l'id passato come parametro
     * @param string $id
     */
    public static function createSession(string $id)
    {
        ini_set('session.gc_maxlifetime', 3600);
        session_set_cookie_params(3600);
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            $_SESSION['id'] = $id;
        }
    }

    /**
     * Controlla che esista un sessione dell'utente
     * @return bool
     */
    public static function sessionExists(): bool
    {
        if(session_status() == PHP_SESSION_NONE)
            session_start();
        $logged = false;
        if (isset($_COOKIE["PHPSESSID"]))
            if (isset($_SESSION['id']))
                $logged = true;
        return $logged;
    }

    /**
     * Elimina la sessione
     */
    public static function sessionDestroy()
    {
        session_start();
        session_unset();
        session_destroy();
    }

    /**
     * Verifica che il token passato come parametro sia valido, in caso affermativo crea una sessione con l'id utente ritornato dalla verifica
     * @param string $token
     * @param string $type tipologia token: API/COOKIE
     */
    public static function tokenValidation(string $token, string $type)
    {
        if(FPersistentManager::verifyToken($token, $type) != null)
            self::createSession(FPersistentManager::verifyToken($token, $type));
    }

}