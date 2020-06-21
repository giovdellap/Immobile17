<?php



class MUtente
{
    private string $nome;
    private string $cognome;
    private string $email;
    private string $id;
    private string $password;
    private MData  $dataNascita;
    private MData  $iscrizione;
    private MMediaUtente $immagine;
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
    public function getImmagine(): MMediaUtente
    {
        return $this->immagine;
    }

    /**
     * @param MMedia $immagine
     */
    public function setImmagine(MMediaUtente $immagine): void
    {
        $this->immagine = $immagine;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return string
     */
    public function getCognome(): string
    {
        return $this->cognome;
    }

    /**
     * @param string $cognome
     */
    public function setCognome(string $cognome): void
    {
        $this->cognome = $cognome;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return MData
     */
    public function getIscrizione(): MData
    {
        return $this->iscrizione;
    }

    /**
     * @param MData $iscrizione
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