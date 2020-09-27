<?php

namespace App\BusinessLogic;

class CodCharge
{
    private $cod_charge_percentage;

    /**
     * CodCharge constructor.
     * @param $cod_charge_percentage
     */
    public function __construct($cod_charge_percentage = env('COD_CHARGE_PERCENTAGE', 1))
    {
        $this->cod_charge_percentage = $cod_charge_percentage;
    }

    public function getCharge()
    {
        return 
    }

}
