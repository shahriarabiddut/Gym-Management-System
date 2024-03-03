<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Member;
use Barryvdh\DomPDF\PDF;
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
        $request->validate([
            'dept' => 'required',
            'photo' => 'required',
            'type' => 'required',
            'gender' => 'required',
            'nidno' => 'required',
            'ini_weight' => 'required',
            'ini_bodytype' => 'required',
        ]);
        if ($request->type == 'student') {
            $request->validate([
                'session' => 'required',
                'rollno' => 'required',
                'fname' => 'required',
                'mname' => 'required',
            ]);
        } elseif ($request->type == 'teacher') {
            $request->validate([
                'dept' => 'required',
            ]);
        }
        $data = new Member();
        $user_id = Auth::user()->id;

        $data->user_id = $user_id;
        $data->dept = $request->dept;
        if (Auth::user()->type == 'student') {
            $data->session = $request->session;
            $data->rollno = $request->rollno;
            $data->fname = $request->fname;
            $data->mname = $request->mname;
        }
        if ($request->hasFile('photo')) {
            $data->photo = $request->file('photo')->store('membership', 'public');
        }
        $data->gender = $request->gender;
        $data->nid = $request->nidno;
        $data->amount = 0;
        $data->plan = $request->plan;
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
    public function generatePDF()
    {
        // $mpdf = new \Mpdf\Mpdf(([
        //     'default_font_size' => 12,
        //     'default_font' => 'nikosh'
        // ]));
        // $html = view('profile.membership.rr')->render();
        // $mpdf->WriteHTML($html);
        // return $mpdf->output(Auth::user()->rollno . ' - membership.pdf', 'D');
        $mpdf = new \Mpdf\Mpdf(([
            'default_font_size' => 12,
            'default_font' => 'nikosh'
        ]));
        $html = view('profile.membership.rr')->render();
        $mpdf->WriteHTML($html);
        return $mpdf->output(Auth::user()->name . ' - membership.pdf', 'D');
    }
    public function generatePDF2()
    {
        return view('profile.membership.rr');
    }
}
