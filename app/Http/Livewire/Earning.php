<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Earning extends Component
{
//    public $parcels;

//    public function mount()
//    {
////        $this->parcels = auth()->user()->parcels()->paginate(10);
//    }

    public function render()
    {
        return view('livewire.earning', [
            'parcels' => auth()->user()
                ->parcels()
                ->where('cod_collected', true)
                ->paginate(10)
        ]);
    }
}
