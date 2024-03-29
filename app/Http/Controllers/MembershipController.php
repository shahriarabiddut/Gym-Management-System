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
            'name' => 'required',
            'profile' => 'required',
            'nid' => 'required',
            'gender' => 'required',
            'siganture' => 'required',
            'category' => 'required|not_in:0',
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
        if ($request->category == '1') {
            $type = 'student';
            $request->validate([
                'fname' => 'required',
                'mname' => 'required',
                'rollno' => 'required',
                'dept' => 'required',
                'session' => 'required',
            ]);
        } elseif ($request->category == '2') {
            $type = 'staff';
            $request->validate([
                'podobi' => 'required',
                'deptoffice' => 'required',
            ]);
        } elseif ($request->category == '3') {
            $type = 'stafffamily';
            $request->validate([
                'staffRelationName' => 'required',
                'staffRelation' => 'required',
                'staffRelationTitle' => 'required',
            ]);
        } elseif ($request->category == '4') {
            $type = 'outsider';
            $request->validate([
                'fname' => 'required',
                'pradd' => 'required',
                'paadd' => 'required',
                'nameofinst' => 'required',
                'podobi' => 'required',
            ]);
        }
        // New Added
        $arrayData = [];
        $arrayData['gender'] = $request->gender;
        $arrayData['dept'] = $request->dept;
        $arrayData['session'] = $request->session;
        $arrayData['rollno'] = $request->rollno;
        $arrayData['fname'] = $request->fname;
        $arrayData['mname'] = $request->mname;
        $arrayData['type'] = $type;
        $arrayData['podobi'] = $request->podobi;
        $arrayData['deptoffice'] = $request->deptoffice;
        $arrayData['staffRelationName'] = $request->staffRelationName;
        $arrayData['staffRelation'] = $request->staffRelation;
        $arrayData['staffRelationTitle'] = $request->staffRelationTitle;
        $arrayData['pradd'] = $request->pradd;
        $arrayData['paadd'] = $request->paadd;
        $arrayData['nameofinst'] = $request->nameofinst;
        if ($request->hasFile('profile')) {
            $arrayData['profile'] = $request->file('profile')->store('membership', 'public');
        }
        if ($request->hasFile('nid')) {
            $arrayData['nid'] = $request->file('nid')->store('membership', 'public');
        }
        if ($request->hasFile('siganture')) {
            $arrayData['siganture'] = $request->file('siganture')->store('membership', 'public');
        }

        $data->membership = json_encode($arrayData);
        $data->status = 0;
        $data->user_id = Auth::user()->id;
        $data->save();
        // Membership Saved
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
