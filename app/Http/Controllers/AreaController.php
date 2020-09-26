<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Zone;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $areas = Area::query()
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('areas.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', Area::class);
        return view('areas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->authorize('create', Area::class);

        $request->validate([
            'name' => 'required|min:5'
        ]);
        Area::create($request->all());
        return redirect()->route('areas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Area $area
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show(Area $area)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Area $area
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Area $area)
    {
        $this->authorize('update', $area);
        return view('areas.edit', compact('area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Area $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        $this->authorize('update', $area);
        $request->validate([
            'name' => 'required|min:5'
        ]);

        $area->update($request->all());
        return redirect()->route('areas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Area $area
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Area $area)
    {
        $this->authorize('delete', $area);
        $area->delete();
        return redirect()->back();
    }
}
