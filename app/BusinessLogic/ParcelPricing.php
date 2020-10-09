<?php

namespace App\BusinessLogic;

class ParcelPricing
{
    private $weight;
    private $price;
    private $cod_percentage;

    /**
     * ParcelPricing constructor.
     * @param $weight
     * @param $price
     */
    public function __construct($weight, $price)
    {
        $this->weight = $weight;
        $this->price = $price;

        $this->cod_percentage = env('COD_PERCENTAGE');
    }


    public function getDeliveryCost()
    {
        if ($this->weight == 1) {
            $charge = 60;
        } else {
            $charge = 60 + (($this->weight - 1) * 15);
        }
        return $charge;
    }


    public function getCodCharge()
    {
        return ($this->price * $this->cod_percentage) / 100;
    }

    public function getMerchantPaybackAmount()
    {
        return ($this->getDeliveryCost() + $this->price) - ($this->getDeliveryCost() + $this->getCodCharge());
    }

    public function getTotalBill()
    {
        return $this->getDeliveryCost() + $this->price;
    }

}
