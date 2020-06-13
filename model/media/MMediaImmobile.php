<?php


class MMediaImmobile extends MMedia
{
    private MImmobile $immobile;

    /**
     * @return MImmobile
     */
    public function getImmobile(): MImmobile
    {
        return $this->immobile;
    }

    /**
     * @param MImmobile $immobile
     */
    public function setImmobile(MImmobile $immobile): void
    {
        $this->immobile = $immobile;
    }


}