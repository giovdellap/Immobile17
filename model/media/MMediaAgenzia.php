<?php


class MMediaAgenzia extends MMedia
{
    private MAgenzia $agenzia;

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


}