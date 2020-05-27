<?php



class MUtente
{
    private String $nome;
    private String $cognome;
    private String $email;
    private String $id;
    private String $password;
    private MData $dataNascita;
    private MData $iscrizione;
    private MMedia $immagine;
    private bool   $attivato;
    private array  $list_Appuntamenti;

    public function __construct()
    {
        $this->list_Appuntamenti = array();
    }

    /**
     * @return array
     */
    public function getListAppuntamenti(): array
    {
        return $this->list_Appuntamenti;
    }

    /**
     * @param array $list_Appuntamenti
     */
    public function setListAppuntamenti(array $list_Appuntamenti): void
    {
        $this->list_Appuntamenti = $list_Appuntamenti;
    }

    /**
     * @return MData
     */
    public function getDataNascita(): MData
    {
        return $this->dataNascita;
    }

    /**
     * @param MData $dataNascita
     */
    public function setDataNascita(MData $dataNascita): void
    {
        $this->dataNascita = $dataNascita;
    }

    /**
     * @return MMedia
     */
    public function getImmagine(): MMedia
    {
        return $this->immagine;
    }

    /**
     * @param MMedia $immagine
     */
    public function setImmagine(MMedia $immagine): void
    {
        $this->immagine = $immagine;
    }

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
    public function getIscrizione(): MData
    {
        return $this->iscrizione;
    }

    /**
     * @param String $iscrizione
     */
    public function setIscrizione(MData $iscrizione): void
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

    /**
     * Aggiunge un appuntamento alla lista appuntamenti dell'Utente
     * @param MAppuntamento $appuntamento
     * @return bool esito dell'operazione
     */
    public function addAppuntamento(MAppuntamento $appuntamento): bool{

        if(!in_array($appuntamento , $this->list_Appuntamenti))
        {
            $this->list_Appuntamenti[] = $appuntamento;
            return true;
        }
        else return false;

    }

    /**
     * Se l'appuntamento è nella lista appuntamenti, lo elimina
     * @param MAppuntamento $appuntamento
     */
    public function deleteAppuntamento(MAppuntamento $appuntamento): void{
        if(in_array($appuntamento, $this ->list_Appuntamenti) )
        {
            unset($this->list_Appuntamenti[array_search($appuntamento, $this->list_Appuntamenti)]);
        }
    }


}