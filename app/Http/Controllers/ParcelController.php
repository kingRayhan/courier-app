<?php

namespace App\Http\Controllers;

use App\Models\Parcel;
use Illuminate\Http\Request;

class ParcelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fallbackStatus = [
            "",
            "placed",
            "picked",
            "shipping",
            "delivered",
            "cancelled",
            "returned",
        ];

        $status = request()->query('status') ? [request()->query('status')] : $fallbackStatus;

        if (auth()->user()->is_admin) {
            $parcels = Parcel::query()
                ->orderByRaw("
                CASE
                    WHEN status='placed' THEN 1
                    WHEN status='picked' THEN 2
                    WHEN status='shipping' THEN 3
                ELSE 4 END
                ")
                ->orderBy('created_at', 'desc')
                ->whereIn('status', $status)
                ->paginate(10);
        } else {
            $parcels = auth()->user()->parcels()
                ->orderByRaw("
                CASE
                    WHEN status='placed' THEN 1
                    WHEN status='picked' THEN 2
                    WHEN status='shipping' THEN 3
                ELSE 4 END
                ")
                ->whereIn('status', $status)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }

        return view('parcels.index', compact('parcels', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('parcels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Parcel $parcel
     * @return \Illuminate\Http\Response
     */
    public function show(Parcel $parcel)
    {
        return view('parcels.show', compact('parcel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Parcel $parcel
     * @return \Illuminate\Http\Response
     */
    public function edit(Parcel $parcel)
    {
        return view('parcels.edit', compact('parcel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Parcel $parcel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parcel $parcel)
    {
        $parcel->update([
            'status' => $request->status,
            'cod_collected' => $request->cod_collected,
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Parcel $parcel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parcel $parcel)
    {
        $parcel->delete();
        return back();
    }
}


/**
 * Admin
 * ----------------------------
 * Order placed
 * Order Amount this month
 * Last 5 orders
 */

/**
 * Merchant
 * -----------------------------
 * Order placed by him
 * In shipping
 * IN
 * Last 5 orders
 */
