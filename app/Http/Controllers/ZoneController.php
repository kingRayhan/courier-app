<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
//        $this->authorize('create', Zone::class);
        $zones = Zone::query()
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('zones.index', compact('zones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Zone::class);
        return view('zones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Zone::class);

        $request->validate([
            'name' => 'required|min:5'
        ]);
        Zone::create($request->all());
        return redirect()->route('zones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Zone $zone
     * @return \Illuminate\Http\Response
     */
    public function show(Zone $zone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Zone $zone
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Zone $zone)
    {
        $this->authorize('create', $zone);
        return view('zones.edit', compact('zone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Zone $zone
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Zone $zone)
    {
        $this->authorize('delete', $zone);
        $request->validate([
            'name' => 'required|min:5'
        ]);

        $zone->update($request->all());
        return redirect()->route('zones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Zone $zone
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Exception
     */
    public function destroy(Zone $zone)
    {
        $this->authorize('delete', $zone);
        $zone->delete();
        return redirect()->back();
    }
}
