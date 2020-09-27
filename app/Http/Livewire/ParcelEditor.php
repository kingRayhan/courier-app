<?php

namespace App\Http\Livewire;

use App\BusinessLogic\ParcelPricing;
use Livewire\Component;

class ParcelEditor extends Component
{
    public $shops;

    /**
     * Fields
     */
    public $customer_name;
    public $customer_phone;
    public $customer_address;
    public $invoice_id;
    public $shop_id;
    public $parcel_price = 0;
    public $weight = 0;


    // Computed
    public $charge = 0;

    public function mount()
    {
        $this->shops = auth()->user()->shops;
    }

    public function updated()
    {
        $pricing = new ParcelPricing(
            $this->weight,
            $this->parcel_price
        );

        $this->charge = $pricing->getCost();
    }

    public function submit()
    {
        dd($this);
    }


    public function render()
    {
        return view('livewire.parcel-editor');
    }
}
