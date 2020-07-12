<?php

/**
 * Class MMail
 * Descrive i parametri delle mail inviate agli utenti
 * @author Della Pelle - Di Domenica - Foderà
 * @package model/utils
 */
class MMail
{
    private string $recipient;

    private string $recipientName;

    private string $subject;

    private string $body;

    public function __construct($recipient, $recipientName, $subject, $body)
    {
        $this->recipient = $recipient;
        $this->recipientName = $recipientName;
        $this->subject = $subject;
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getRecipient(): string
    {
        return $this->recipient;
    }

    /**
     * @param string $recipient
     */
    public function setRecipient(string $recipient): void
    {
        $this->recipient = $recipient;
    }

    /**
     * @return string
     */
    public function getRecipientName(): string
    {
        return $this->recipientName;
    }

    /**
     * @param string $recipientName
     */
    public function setRecipientName(string $recipientName): void
    {
        $this->recipientName = $recipientName;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body): void
    {
        $this->body = $body;
    }


}