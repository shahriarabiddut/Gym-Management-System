<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {

        $membership = Member::all()->where('user_id', '=', Auth::user()->id)->count();
        if ($membership == '0') {
            return view('profile.membership.enroll');
        } else {
            return redirect()->route('user.profile.view')->with('danger', 'Membership Exist!');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->dept);
        //
        $request->validate([
            'dept' => 'required',
            'gender' => 'required',
            'services' => 'required',
            'plan' => 'required',
            'p_year' => 'required',
            'ini_weight' => 'required',
            'ini_bodytype' => 'required',
        ]);
        $data = new Member();
        $user_id = Auth::user()->id;
        $currentDate = Carbon::now(); // get current date and time
        $currentDate = $currentDate->setTimezone('GMT+6')->format('Y-m-d'); // 2023-03-17

        $data->user_id = $user_id;
        $data->dept = $request->dept;
        if (Auth::user()->type == 'student') {
            $data->session = $request->session;
        }
        $data->dor = $currentDate;
        $data->gender = $request->gender;
        $data->services = $request->services;
        $data->amount = 0;
        $data->plan = $request->plan;
        $data->p_year = $request->p_year;
        $data->status = 0;
        $data->ini_weight = $request->ini_weight;
        $data->ini_bodytype = $request->ini_bodytype;
        $data->save();

        return redirect()->route('user.profile.view')->with('success', 'Membership Successful!');
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
        $data = Member::all()->where('user_id', '=', $id)->first();
        return view('profile.membership.enrollEdit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = Member::all()->where('user_id', '=', $id)->first();
        $request->validate([
            'curr_weight' => 'required',
            'curr_bodytype' => 'required',
        ]);
        $data->curr_weight = $request->curr_weight;
        $data->curr_bodytype = $request->curr_bodytype;
        $data->save();
        return redirect()->route('user.profile.view')->with('success', 'Membership Updated Successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
