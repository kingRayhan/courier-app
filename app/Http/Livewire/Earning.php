<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Earning extends Component
{

    public function render()
    {
        $parcel = auth()->user()
            ->parcels()
            ->where('cod_collected', true)
            ->paginate(10);

        return view('livewire.earning', [
            'parcels' => $parcel
        ]);
    }
}
