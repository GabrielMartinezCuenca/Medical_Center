<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultingRoomRequest;
use App\Models\Consulting_room;
use App\Models\Medical_especiality;
use Illuminate\Http\Request;

class Consulting_RoomController extends Controller
{
    public function __construct(){
        $this->middleware('can:consulting-room.index')->only('index');
        $this->middleware('can:consulting-room.create')->only('create','store');
        $this->middleware('can:consulting-room.edit')->only('edit','update');
        $this->middleware('can:consulting-room.destroy')->only('destroy');
    }
    public function index()
    {
        $consulting_rooms = Consulting_room::paginate(10);
        return view('admin.consulting_rooms.index', compact('consulting_rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $especialities = Medical_especiality::all();
        return view('admin.consulting_rooms.create', compact('especialities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConsultingRoomRequest $request)
    {
        Consulting_room::create(
            [
                'name' => $request -> name,
                'location' => $request -> location,
                'phone' => $request -> phone,
                'especiality' => $request -> especiality,
                'schedule_start' => $request -> schedule_start,
                'schedule_end' => $request -> schedule_end,
                'services' => $request -> services,
                'email' => $request -> email,
                'information' => $request -> information,

            ]
        );

        return redirect()->action([Consulting_RoomController::class, 'index']);

    }


    public function edit(Consulting_room $consulting_room)
    {
        $especialities = Medical_especiality::all();
        return view('admin.consulting_rooms.edit', compact('consulting_room', 'especialities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ConsultingRoomRequest $request, Consulting_room $consulting_room)
    {
        $consulting_room -> update(
            [
                'name' => $request -> name,
                'location' => $request -> location,
                'phone' => $request -> phone,
                'especiality' => $request -> especiality,
                'schedule_start' => $request -> schedule_start,
                'schedule_end' => $request -> schedule_end,
                'services' => $request -> services,
                'email' => $request -> email,
                'information' => $request -> information,
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consulting_room $consulting_room)
    {
        $consulting_room -> delete();

        return redirect()->action([Consulting_RoomController::class, 'index']);

    }
}
