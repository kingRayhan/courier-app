<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ParcelEditor extends Component
{
    public function render()
    {
        return view('livewire.parcel-editor')
            ->layout('components.dashboard', [
                'headerHook' => '',
                'footerHook' => '',
            ]);
    }
}
