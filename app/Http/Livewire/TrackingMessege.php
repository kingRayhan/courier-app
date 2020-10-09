<?php

namespace App\Http\Livewire;

use App\Models\Parcel;
use App\Models\Tracker;
use Livewire\Component;

class TrackingMessege extends Component
{
    public $message;
    public $parcel;


    public function mount(Parcel $parcel)
    {
        $this->parcel = $parcel;
    }


    protected $rules = [
        'message' => 'required'
    ];

    public function submit()
    {
        $this->validate();

        $tracker = new Tracker();
        $tracker->tracking_id = $this->parcel->tracking_id;
        $tracker->status_message = $this->message;
        $tracker->save();
    }


    public function render()
    {
        return view('livewire.tracking-messege');
    }
}
