<?php


class VSenderProxy
{
    private static $instance;

    private MUtente $utente;

    private MAmministratore $admin;

    private string $error;

    private bool $api;

    /**
     * Singleton Instance
     * @return FDataBase
     */
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new VSenderProxy();
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

    public function homepage(MAgenzia $agenzia, array $immobili)
    {
        if($this->api == true)
        {

        }
        else VHome::homepage($this->getSmarty(), $agenzia, $immobili);
    }


    // ---- IMMOBILE ----

    public function visualizzaImmobile(MImmobile $immobile)
    {
        if($this->api == true)
        {

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

    public function visualizzaImmobili(array $immobili)
    {
        if($this->api == true)
        {

        }
        else VImmobile::visualizzaImmobili($this->getSmarty(), $immobili);
    }

    public function immobileCalendario(array $appLiberi, Mdata $inizio, MData $fine, MImmobile $immobile)
    {
        if($this->api == true)
        {

        }
        else VImmobile::calendario($this->getSmarty(), $appLiberi, $inizio, $fine, $immobile);
    }

    public function ricerca(array $immobili, array $parameters)
    {
        if($this->api == true)
        {

        }
        else VImmobile::ricerca($this->getSmarty(), $immobili, $parameters);
    }

    // ---- UTENTE ----


    public function loginForm()
    {
        if($this->api == true)
        {

        }
        else VUtente::loginForm($this->getSmarty());
    }

    public function registrationForm()
    {
        if($this->api == true)
        {

        }
        else VUtente::showRegistrationForm($this->getSmarty());
    }

    public function registrationOK()
    {
        if($this->api == true)
        {

        }
        else VUtente::registrationOK($this->getSmarty());
    }

    public function visualizzaProfilo()
    {
        if($this->api == true)
        {

        }
        else VUtente::visualizzaProfilo($this->getSmarty());
    }

    public function showCalendario(array $appuntamenti)
    {
        if($this->api == true)
        {

        }
        else VUtente::showCalendario($this->getSmarty(), $appuntamenti);
    }

    public function eliminaAccount()
    {
        if($this->api == true)
        {

        }
        else VUtente::eliminaAccount($this->getSmarty());
    }

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

    public function modificaPassword()
    {
        if($this->api == true)
        {

        }
        else VUtente::showModificaPassword($this->getSmarty());
    }

    public function forgotPassword()
    {
        if($this->api == true)
        {

        }
        else VUtente::showForgotPassword($this->getSmarty());
    }

    public function forgotPasswordForm()
    {
        if ($this->api == true) {

        }
        else VUtente::formForgotPassword($this->getSmarty());
    }

    public function sendToken($token)
    {
        if($this->api)
        {

        }

    }

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