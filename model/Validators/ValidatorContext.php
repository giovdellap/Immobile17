<?php


class ValidatorContext
{
    private Appuntamento $appuntamento;

    public function __construct(Appuntamento $appuntamento)
    {
        $this->appuntamento = $appuntamento;
    }

    public function validateAppuntamento(Validator $validator): bool
    {
        return $validator->validate($this->appuntamento);
    }
}