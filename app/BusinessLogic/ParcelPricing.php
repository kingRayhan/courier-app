<?php

namespace App\BusinessLogic;

class ParcelPricing
{
    private $weight;
    private $price;

    /**
     * ParcelPricing constructor.
     * @param $weight
     * @param $price
     */
    public function __construct($weight, $price)
    {
        $this->weight = $weight;
        $this->price = $price;
    }


    public function getCost()
    {
        if ($this->weight == 1) {
            $charge = 60;
        } else {
            $charge = 60 + (($this->weight - 1) * 15);
        }
        return $charge;
    }
}
