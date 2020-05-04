<?php

class Amministratore
{
    private String $mail;
    private String $password;
    private String $id;
    private String $nome;
    private String $cognome;
    private Agenzia $agenzia;

    /**
     * @return String
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * @param String $mail
     */
    public function setMail(string $mail): void
    {
        $this->mail = $mail;
    }

    /**
     * @return String
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param String $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return String
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param String $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return String
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param String $nome
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return String
     */
    public function getCognome(): string
    {
        return $this->cognome;
    }

    /**
     * @param String $cognome
     */
    public function setCognome(string $cognome): void
    {
        $this->cognome = $cognome;
    }

    /**
     * @return Agenzia
     */
    public function getAgenzia(): Agenzia
    {
        return $this->agenzia;
    }

    /**
     * @param Agenzia $agenzia
     */
    public function setAgenzia(Agenzia $agenzia): void
    {
        $this->agenzia = $agenzia;
    }

    public function getCalendarioAgenzia(): Calendario
    {
        return $this->agenzia->getCalendario();
    }

    public function setCalendarioAgenzia(Calendario $calendario): void
    {
        $this->agenzia->setCalendario($calendario);
    }
    
    
}

