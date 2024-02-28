<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Room::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::search()->with(["building"])->orderBy("created_at")->paginate(request("rows") ?? 10);
        return inertia("admin/room/index", [
            "rooms" => $rooms
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
            "room" => "required",
            "building_id" => "required|uuid"
        ]);

        Room::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        $data = $request->validate([
            "room" => "required",
            "building_id" => "required|uuid"
        ]);

        $room->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();
    }

    public function get() {
        return Room::all(["id", "room"]);
    }
}
