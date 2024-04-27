<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Member;
use App\Models\Payment;
use App\Models\PlanMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Payment::all()->where('user_id', '=', Auth::user()->id);
        return view('profile.payment.index', ['data' => $data]);
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
    public function planPayment(string $id)
    {
        //
        $data = Payment::all()->where('plan_member_id', '=', $id)->first();
        if ($data->status == 0) {
            $plans = Plan::all();
            return view('profile.membership.payment', ['payment' => $data, 'plans' => $plans]);
        } else {
            return redirect()->route('user.dashboard')->with('danger', ' Allready Paid');
        }
    }
    public function paymentupdate(Request $request)
    {
        $data = Payment::all()->where('id', '=', $request->id)->first();
        //
        $request->validate([
            'mobile' => 'required',
            'method' => 'required',
            'amount' => 'required',
        ]);
        $data->method = $request->method . ' - ' . $request->mobile;
        $data->status = 2;
        $data->save();
        $dataPlanMember = PlanMember::all()->where('id', '=', $data->plan_member_id)->first();
        $dataPlanMember->status = 2;
        $dataPlanMember->save();
        $dataMember = Member::all()->where('user_id', '=',  $data->user_id)->first();
        $dataMember->status = 3;
        $dataMember->save();
        return redirect()->route('user.profile.view')->with('success', 'Payment addedd Successfully! Wait for Approval.');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
