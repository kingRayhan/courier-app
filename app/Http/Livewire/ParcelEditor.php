<?php

namespace App\Http\Livewire;

use App\BusinessLogic\ParcelPricing;
use App\Models\Parcel;
use Livewire\Component;

class ParcelEditor extends Component
{
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
    public $cod_charge = 0;
    public $merchant_payback_amount = 0;
    public $is_editing = false;
    public $parcel;
    public $shops;

    public function mount(Parcel $parcel)
    {
        $this->shops = auth()->user()->shops;

        if ($parcel->exists) {
            $this->parcel = $parcel;
            $this->customer_name = $parcel->customer_name;
            $this->customer_phone = $parcel->customer_phone;
            $this->customer_address = $parcel->customer_address;
            $this->invoice_id = $parcel->invoice_id;
            $this->parcel_price = $parcel->parcel_price;
            $this->weight = $parcel->weight;
            $this->shop_id = $parcel->shop_id;

            $this->is_editing = true;
            $this->calculate_charges();
        }

    }

    private function calculate_charges()
    {
        $pricing = new ParcelPricing(
            $this->weight,
            $this->parcel_price
        );

        $this->delivery_charge = $pricing->getDeliveryCost();
        $this->cod_charge = $pricing->getCodCharge();
        $this->merchant_payback_amount = $pricing->getMerchantPaybackAmount();
    }

    public function updated()
    {
        $this->calculate_charges();
    }

    private function createParcel()
    {
        auth()->user()->parcels()->create([
            'customer_name' => $this->customer_name,
            'customer_phone' => $this->customer_phone,
            'customer_address' => $this->customer_address,
            'invoice_id' => $this->invoice_id,
            'shop_id' => $this->shop_id,
            'parcel_price' => $this->parcel_price,
            'weight' => $this->weight,
        ]);
    }

    private function updateParcel()
    {
        $this->parcel->update([
            'customer_name' => $this->customer_name,
            'customer_phone' => $this->customer_phone,
            'customer_address' => $this->customer_address,
            'invoice_id' => $this->invoice_id,
            'shop_id' => $this->shop_id,
            'parcel_price' => $this->parcel_price,
            'weight' => $this->weight,
        ]);
    }

    public function submit()
    {
        $this->validate();

        if ($this->is_editing) {
            $this->updateParcel();
        } else {
            $this->createParcel();
        }


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
