<?php

namespace App\Http\Livewire;

use App\Models\Parcel;
use App\Models\Tracker;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class TrackingMessege extends Component
{
    use AuthorizesRequests;

    public $message;
    public $parcel;
    public $tracking_messages;
    protected $listeners = ['refreshComponent' => '$refresh'];

    protected $rules = [
        'message' => 'required'
    ];


    private function loadTracker()
    {
        $this->tracking_messages = $this->parcel->tracker;
    }

    public function mount(Parcel $parcel)
    {
        $this->parcel = $parcel;
        $this->loadTracker();
    }

    public function deleteMessage(Tracker $message)
    {
        $this->authorize('delete', $message);
        $message->delete();
    }

    public function submit()
    {
        $this->authorize('create', Tracker::class);
        $this->validate();

        $this->parcel->tracker()->create([
            'status_message' => $this->message
        ]);
        $this->message = '';
        $this->loadTracker();
    }


    public function render()
    {
        return view('livewire.tracking-messege');
    }
}
