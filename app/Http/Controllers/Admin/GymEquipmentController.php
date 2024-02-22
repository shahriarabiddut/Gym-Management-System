<?php

namespace App\Http\Controllers\Admin;

use App\Models\Equipment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GymEquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Equipment::all();
        return view('admin.equipment.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.equipment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = new Equipment;
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'amount' => 'required',
            'quantity' => 'required',
            'vendor' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'date' => 'required',
        ]);

        $data->name = $request->name;
        $data->description = $request->description;
        $data->amount = $request->amount * $request->quantity;
        $data->quantity = $request->quantity;
        $data->vendor = $request->vendor;
        $data->address = $request->address;
        $data->contact = $request->contact;
        $data->date = $request->date;
        $data->addedby = 0;

        $data->save();

        return redirect()->route('admin.equipment.index')->with('success', 'Equipment Data has been added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Equipment::find($id);
        return view('admin.equipment.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = Equipment::find($id);
        return view('admin.equipment.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $data = Equipment::find($id);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'amount' => 'required',
            'quantity' => 'required',
            'vendor' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'date' => 'required',
        ]);

        $data->name = $request->name;
        $data->description = $request->description;
        $data->amount = $request->amount * $request->quantity;
        $data->quantity = $request->quantity;
        $data->vendor = $request->vendor;
        $data->address = $request->address;
        $data->contact = $request->contact;
        $data->date = $request->date;
        $data->save();

        return redirect()->route('admin.equipment.index')->with('success', 'Equipment Data has been updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Equipment::find($id);
        $data->delete();
        return redirect()->route('admin.equipment.index')->with('danger', 'Data has been deleted Successfully!');
    }
}
