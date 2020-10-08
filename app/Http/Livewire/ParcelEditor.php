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
    public $weight = 1;

    protected $rules = [
        'customer_name' => 'required|min:6',
        'customer_phone' => 'required',
        'customer_address' => 'required',
        'invoice_id' => 'required',
        'shop_id' => 'required',
        'parcel_price' => 'required',
        'weight' => 'required',
    ];


    // Computed
    public $delivery_charge = 0;

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

        $this->delivery_charge = $pricing->getCost();
    }

    public function submit()
    {
        $this->validate();

        auth()->user()->parcels()->create([
            'customer_name' => $this->customer_name,
            'customer_phone' => $this->customer_phone,
            'customer_address' => $this->customer_address,
            'invoice_id' => $this->invoice_id,
            'shop_id' => $this->shop_id,
            'parcel_price' => $this->parcel_price,
            'weight' => $this->weight,
        ]);

        return $this->redirectRoute('parcels.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.parcel-editor');
    }
}
