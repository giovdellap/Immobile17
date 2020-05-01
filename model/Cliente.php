<?php


class Cliente
{
    private String $nome;
    private String $cognome;
    private String $email;
    private String $id;
    private String $password;
    private String $iscrizione;
    private bool   $attivato;
    private array  $list_Appuntamenti;

    /**
     * @return String
     */
    public function getNome(): String
    {
        return $this->nome;
    }

    /**
     * @param String $nome
     */
    public function setNome(String $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return String
     */
    public function getCognome(): String
    {
        return $this->cognome;
    }

    /**
     * @param String $cognome
     */
    public function setCognome(String $cognome): void
    {
        $this->cognome = $cognome;
    }

    /**
     * @return String
     */
    public function getEmail(): String
    {
        return $this->email;
    }

    /**
     * @param String $email
     */
    public function setEmail(String $email): void
    {
        $this->email = $email;
    }

    /**
     * @return String
     */
    public function getId(): String
    {
        return $this->id;
    }

    /**
     * @param String $id
     */
    public function setId(String $id): void
    {
        $this->id = $id;
    }

    /**
     * @return String
     */
    public function getPassword(): String
    {
        return $this->password;
    }

    /**
     * @param String $password
     */
    public function setPassword(String $password): void
    {
        $this->password = $password;
    }

    /**
     * @return String
     */
    public function getIscrizione(): String
    {
        return $this->iscrizione;
    }

    /**
     * @param String $iscrizione
     */
    public function setIscrizione(String $iscrizione): void
    {
        $this->iscrizione = $iscrizione;
    }

    /**
     * @return bool
     */
    public function isAttivato(): bool
    {
        return $this->attivato;
    }

    /**
     * @param bool $attivato
     */
    public function setAttivato(bool $attivato): void
    {
        $this->attivato = $attivato;
    }

    public function addAppuntamento($appuntamento): void{

        ////
    }

    public function deleteAppuntamento($appuntamento): void{

        ////
    }


}