<?php

namespace App\Http\Controllers;

use App\Models\Parcel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        if (auth()->user()->is_admin) {
            $parcels = new Parcel();
        } else {
            $parcels = auth()->user()->parcels;
        }

        $placed = $parcels->where('status', 'placed')->count();
        $picked = $parcels->where('status', 'picked')->count();
        $shipping = $parcels->where('status', 'shipping')->count();
        $delivered = $parcels->where('status', 'delivered')->count();
        $cancelled = $parcels->where('status', 'cancelled')->count();
        $returned = $parcels->where('status', 'returned')->count();

        return view('dashboard', compact('placed', 'picked', 'shipping', 'delivered', 'cancelled', 'returned'));
    }
}
