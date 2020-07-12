<?php

/**
 * Class MAmministratore
 * Classe che descrive un amministratore e gli consente di accedere all'MAgenzia
 * @access public
 * @author Della Pelle - Di Domenica - Foderà
 * @package model
 */
class MAmministratore
{
    private String $id;
    private String $mail;
    private String $password;
    private String $nome;
    private String $cognome;
    private MAgenzia $agenzia;

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
     * @return MAgenzia
     */
    public function getAgenzia(): MAgenzia
    {
        return $this->agenzia;
    }

    /**
     * @param MAgenzia $agenzia
     */
    public function setAgenzia(MAgenzia $agenzia): void
    {
        $this->agenzia = $agenzia;
    }

    /**
     * @return MCalendario
     */
    public function getCalendarioAgenzia(): MCalendario
    {
        return $this->agenzia->getCalendario();
    }

    /**
     * @param MCalendario $calendario
     */
    public function setCalendarioAgenzia(MCalendario $calendario): void
    {
        $this->agenzia->setCalendario($calendario);
    }
    
    
}

