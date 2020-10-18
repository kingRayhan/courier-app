<?php

namespace App\Http\Controllers;

use App\Models\Parcel;
use App\Models\Tracker;
use Illuminate\Http\Request;

class TrackerController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function tracker(Request $request)
    {
        $tracking_id = $request->get('tracking_code');

        if (!$tracking_id)
            return redirect()->route('home');

        $parcel = Parcel::query()->where('tracking_id', $tracking_id)->first();
        $tracking_messages = $parcel->tracker;
        return view('tracker.index', compact('parcel', 'tracking_id', 'tracking_messages'));
    }
}
