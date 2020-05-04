<?php


interface Validator
{
    public function validate(Appuntamento $appuntamento): bool;
}