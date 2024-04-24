<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Http\Controllers\Controller;

class PlanController extends Controller
{
    //
    public function index()
    {
        $data = Plan::all();
        return view('admin.plan.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.plan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = new Plan();
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'validity' => 'required',
            'status' => 'required',
        ]);
        $data->name = $request->name;
        $data->amount = $request->amount;
        $data->validity = $request->validity;
        $data->status = $request->status;
        $data->save();

        return redirect()->route('admin.plan.index')->with('success', ' Plan Data has been added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Plan::find($id);
        return view('admin.plan.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Plan::find($id);
        return view('admin.plan.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $data = Plan::find($id);
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'validity' => 'required',
            'status' => 'required',
        ]);
        $data->name = $request->name;
        $data->amount = $request->amount;
        $data->validity = $request->validity;
        $data->status = $request->status;
        $data->save();

        return redirect()->route('admin.plan.index')->with('success', ' Plan Data has been updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Plan::find($id);
        $data->delete();
        return redirect()->route('admin.plan.index')->with('danger', ' Plan Data has been deleted Successfully!');
    }
}
