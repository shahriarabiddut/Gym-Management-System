<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function active(string $id)
    {
        //
        $data = Member::all()->where('user_id', '=', $id)->first();
        if ($data == null) {
            return redirect()->route('admin.user.show', $id)->with('success', 'Membership Not Found!');
        }
        $data->status = 1;
        $data->save();
        return redirect()->route('admin.user.show', $id)->with('success', 'Membership Updated Successful!');
    }
    public function disable(string $id)
    {
        //
        $data = Member::all()->where('user_id', '=', $id)->first();
        if ($data == null) {
            return redirect()->route('admin.user.show', $id)->with('success', 'Membership Not Found!');
        }
        $data->status = 2;
        $data->save();
        return redirect()->route('admin.user.show', $id)->with('success', 'Membership Updated Successful!');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
