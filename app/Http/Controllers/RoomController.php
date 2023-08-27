<?php

namespace App\Http\Controllers;

use App\Models\room;
use Illuminate\Http\Request;

class roomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = room::paginate(10); //thêm vào cuối
        // $data = Employee::orderByDesc('created_at')->paginate(10);    thêm vào đầu
         $i = 1;
         return view('index', compact('data'))->with('i', $i);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'number'          =>  'required|unique:rooms',
            'type'         =>  'required|string',
            'availability'         =>  'required|string',
        ]);


        $room = new room();
        $room->number = $request->number;
        $room->type = $request->type;
        $room->availability = $request->availability;

        $room->save();

        return redirect()->route('rooms.index')->with('success', 'Room Added successfully.');
   
    }

    /**
     * Display the specified resource.
     */
    public function show(room $room)
    {
        return view('show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(room $room)
    {
        return view('edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, room $room)
    {
        $request->validate([
            'number'          =>  'required|unique:rooms',
            'type'         =>  'required|string',
            'availability'         =>  'required|string',
        ]);

        $room = room::find($request->hidden_id);
        $room->number = $request->number;
        $room->type = $request->type;
        $room->availability = $request->availability;
        $room->save();

        return redirect()->route('rooms.index')->with('success', 'Room Added successfully.');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Room data deleted successfully.');
    }
}
