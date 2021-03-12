<?php

/**
 * Class VSenderAdapter
 * Adapter che passa i dati ottenuti come parametro dai controller alle classi view a seconda del parametro api
 * @author Della Pelle - Di Domenica - Foderà
 * @package view
 */
class VSenderAdapter
{
    private static $instance;

    private MUtente $utente;

    private MAmministratore $admin;

    private string $error;

    private bool $api;

    /**
     * Singleton Instance
     * @return VSenderAdapter
     */
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new VSenderAdapter();
        }
        return self::$instance;
    }

    /**
     * @return bool
     */
    public function isApi(): bool
    {
        return $this->api;
    }

    /**
     * @param bool $api
     */
    public function setApi(bool $api): void
    {
        $this->api = $api;
    }

    /**
     * @return MUtente
     */
    public function getUtente(): MUtente
    {
        return $this->utente;
    }

    /**
     * @param MUtente $utente
     */
    public function setUtente(MUtente $utente): void
    {
        $this->utente = $utente;
    }

    /**
     * @return MAmministratore
     */
    public function getAdmin(): MAmministratore
    {
        return $this->admin;
    }

    /**
     * @param MAmministratore $admin
     */
    public function setAdmin(MAmministratore $admin): void
    {
        $this->admin = $admin;
    }

    /**
     * @return string
     */
    public function getError(): string
    {
        return $this->error;
    }

    /**
     * @param string $error
     */
    public function setError(string $error): void
    {
        $this->error = $error;
    }

    // ---- HOMEPAGE ----

    /**
     * Passa i dati della homepage ai metodi della view
     * @param MAgenzia $agenzia
     * @param array $immobili
     */
    public function homepage(MAgenzia $agenzia, array $immobili)
    {
        if($this->api == true)
        {
            VJSONSender::homepage($immobili);
        }
        else VHome::homepage($this->getSmarty(), $agenzia, $immobili);
    }


    // ---- IMMOBILE ----

    /**
     * Passa l'oggetto MImmobile alla view che permette di visualizzarlo
     * @param MImmobile $immobile
     */
    public function visualizzaImmobile($immobile)
    {
        if($this->api == true)
        {
            if(isset($this->error)) {
                VJSONSender::sendError($this->getError());
            } else {
                VJSONSender::sendImmobile($immobile);
            }
        }
        else
        {
            if (!isset($this->utente))
                $tipoUtente = 'VISITATORE';
            elseif ($this->utente instanceof MCliente)
                $tipoUtente='CLIENTE';
            else $tipoUtente = 'AGENTE';
            VImmobile::visualizza($this->getSmarty(), $immobile, $tipoUtente);
        }

    }

    /**
     * Passa un array di immobili alla view
     * @param array $immobili
     */
    public function visualizzaImmobili(array $immobili)
    {
        if($this->api == true)
        {
            if(isset($this->error)) $immobili["error"] = $this.$this->getError();
            VJSONSender::sendImmobili($immobili);
        }
        else VImmobile::visualizzaImmobili($this->getSmarty(), $immobili);
    }

    /**
     * Passa i dati necessari a visualizzare il calendario per la prenotazione appuntamento alla View
     * @param array $appLiberi
     * @param Mdata $inizio
     * @param MData $fine
     * @param MImmobile $immobile
     * @throws SmartyException
     */
    public function immobileCalendario(array $appLiberi, Mdata $inizio, MData $fine, MImmobile $immobile)
    {
        if($this->api == true)
        {
            VJSONSender::sendCalendario($appLiberi);
        }
        else VImmobile::calendario($this->getSmarty(), $appLiberi, $inizio, $fine, $immobile);
    }

    public function confermaAppuntamento(MAppuntamento $appuntamento)
    {
        if(isset($this->error))
        {
            VJSONSender::sendError($this->getError());
        } else {
            VJSONSender::sendAppuntamento($appuntamento);
        }
    }

    /**
     * Passa gli immobili e i parametri della ricerca alla view
     * @param array $immobili
     * @param array $parameters
     */
    public function ricerca(array $immobili, array $parameters)
    {
        if($this->api == true)
        {
            VJSONSender::ricercaImmobili($immobili);
        }
        else VImmobile::ricerca($this->getSmarty(), $immobili, $parameters);
    }

    // ---- UTENTE ----

    /**
     * Chiama la funzione di visualizzazione della login form
     */
    public function loginForm()
    {
        if($this->api == true)
        {
            VJSONSender::sendError($this->getError());
        }
        else VUtente::loginForm($this->getSmarty());
    }

    /**
     * Chiama la funzione di visualizzazione della form di registrazione
     */
    public function registrationForm()
    {
        if($this->api == true)
        {
            VJSONSender::sendError($this->getError());
        }
        else VUtente::showRegistrationForm($this->getSmarty());
    }

    /**
     * Chiama la funzione di notifica della registrazione avvenuta con successo
     */
    public function registrationOK()
    {
        if($this->api == true)
        {

        }
        else VUtente::registrationOK($this->getSmarty());
    }

    /**
     * Chiama la funzione di visualizzazione del profilo utente nella view
     */
    public function visualizzaProfilo()
    {
        if($this->api == true)
        {
            VJSONSender::visualizzaProfilo($this->getUtente());
        }
        else VUtente::visualizzaProfilo($this->getSmarty());
    }

    /**
     * Chiama la funzione di visualizzazione del calendario utente passandogli gli appuntamenti
     * @param array $appuntamenti
     */
    public function showCalendario(array $appuntamenti)
    {
        if($this->api == true)
        {
            VJSONSender::sendAppuntamenti($appuntamenti);
        }
        else VUtente::showCalendario($this->getSmarty(), $appuntamenti);
    }

    /**
     * Chiama la funzione di visualizzazione del form di eliminazione account
     */
    public function eliminaAccount()
    {
        if($this->api == true)
        {

        }
        else VUtente::eliminaAccount($this->getSmarty());
    }

    /**
     * Chiama la funzione di visualizzazione dell'appuntamento nelle view
     * @param MAppuntamento $appuntamento
     */
    public function visualizzaAppuntamento(MAppuntamento $appuntamento)
    {
        if($this->api == true)
        {

        }
        else
        {
            if($this->utente instanceof MCliente)
                VUtente::showAppuntamento($this->getSmarty(), $appuntamento, 'CLIENTE');
            else VUtente::showAppuntamento($this->getSmarty(), $appuntamento, 'AGENTE');
        }
    }

    /**
     * Visualizza il form di modifica password
     */
    public function modificaPassword()
    {
        if($this->api == true)
        {
            if(isset($this->error)) VJSONSender::sendError($this->getError());
        }
        else VUtente::showModificaPassword($this->getSmarty());
    }

    /**
     * Visualizza la notifica di password modificata
     */
    public function forgotPassword()
    {
        if($this->api == true)
        {

        }
        else VUtente::showForgotPassword($this->getSmarty());
    }

    /**
     * Visualizza la form per la password dimenticata
     */
    public function forgotPasswordForm()
    {
        if ($this->api == true) {

        }
        else VUtente::formForgotPassword($this->getSmarty());
    }

    /**
     * Passa il token alla view API dopo un login avvenuto con successo
     * @param $token
     */
    public function sendToken($token)
    {
        if($this->api)
        {
            VJSONSender::sendToken($token, $this->getUtente());
        }
    }

    /**
     * Ritorna un oggetto Smarty con già assegnati i parametri del VSenderAdapter
     * @return Smarty
     */
    private function getSmarty():Smarty
    {
        if(isset($this->utente))
            $smarty = VSmartyFactory::userSmarty($this->utente);
        else if(isset($this->admin))
            $smarty = VSmartyFactory::adminSmarty($this->admin);
        else $smarty = VSmartyFactory::basicSmarty();
        if(isset($this->error))
            return VSmartyFactory::errorSmarty($smarty, $this->error);
        else return $smarty;
    }

}