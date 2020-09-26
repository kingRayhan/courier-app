<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Shop;
use App\Models\Zone;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $shops = auth()->user()->shops()
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('shops.index', compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', Shop::class);
        $zones = Zone::all();
        $areas = Area::all();

        return view('shops.create', compact('zones', 'areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        $this->authorize('create', Shop::class);

        $payload = $request->validate([
            'name' => "required|min:3",
            'pickup_address' => "required|min:10",
            'shop_phone' => "required|max:15",
            'area_id' => "required",
            'zone_id' => "required",
        ]);
        auth()->user()->shops()->create($payload);

        return redirect()->route('shops.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Shop $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Shop $shop
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Shop $shop)
    {
        $this->authorize('update', $shop);
        $zones = Zone::all();
        $areas = Area::all();

        return view('shops.edit', compact('zones', 'areas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Shop $shop
     * @return array
     */
    public function update(Request $request, Shop $shop)
    {
        $this->authorize('update', $shop);

        $payload = $request->validate([
            'name' => "required|min:3",
            'pickup_address' => "required|min:10",
            'shop_phone' => "required|max:15",
            'area_id' => "required",
            'zone_id' => "required",
        ]);


        auth()->user()->shops()->update($payload);

        return redirect()->route('shops.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Shop $shop
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Shop $shop)
    {
        $this->authorize('delete', $shop);
        $shop->delete();
        return redirect()->route('shops.index');
    }
}
