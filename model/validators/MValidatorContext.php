<?php


class MValidatorContext
{
    private MAppuntamento $appuntamento;

    public function __construct(MAppuntamento $appuntamento)
    {
        $this->appuntamento = $appuntamento;
    }

    public function validateAppuntamento(MValidator $validator): bool
    {
        return $validator->validate($this->appuntamento);
    }
}