<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Member;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'profile' => ['required'],
            'nid' => ['required'],
            'siganture' => ['required'],
            'category' => ['required', 'string', 'max:255', 'not_in:0'],
            'mobile' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'regex:/(.+)@(.+)\.(.+)/i', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
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
        // Membership
        $data = new Member();
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
        //
        $user = User::create([
            'name' => $request->name,
            'type' => $type,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
        ]);
        event(new Registered($user));
        //
        $data->user_id = $user->id;
        $data->save();
        // Membership Saved
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
