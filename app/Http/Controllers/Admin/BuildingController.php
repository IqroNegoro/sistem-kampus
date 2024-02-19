<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buildings = Building::search()->orderBy("created_at")->paginate(request("rows") ?? 10);
        return inertia("admin/building/index", [
            "buildings" => $buildings
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required"
        ]);

        Building::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Building $building)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Building $building)
    {
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Building $building)
    {
        $data = $request->validate([
            "name" => "required"
        ]);
    
        $building->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Building $building)
    {
        $building->delete();
    }

    public function get() {
        return Building::all(["id", "name"]);
    }
}
