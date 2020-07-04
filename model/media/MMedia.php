<?php


class MMedia
{
    private string $id;
    private string $nome;
    private string $type;
    private  $data;


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
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getData()
    {
        return $this->data ;
    }

    /**
     * @param string $immagine
     */
    public function setData(string $data)
    {
        $this->data = $data;
    }

    public function viewImageHTML():string
    {
       return  "data:image/" . explode("/", $this->getType())[1] . ";base64," . $this->getData();
    }

}