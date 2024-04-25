<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\member;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{

    public function index()
    {
        $membership = Member::all()->where('user_id', '=', Auth::user()->id)->first();
        return view('profile.dashboard', ['membership' => $membership]);
    }
    /**
     * Display the user's profile form.
     */
    public function view(Request $request): View
    {
        return view('profile.partials.view', [
            'user' => $request->user(),
        ]);
    }


    public function edit(Request $request): View
    {
        return view('profile.partials.edit', [
            'user' => $request->user(),
        ]);
    }
    public function editpassword()
    {
        return view('profile.partials.editPassword');
    }
    public function updatepassword(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $request->validate([
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
            'opassword' => 'required',
        ]);
        if (Hash::check($request->opassword, Auth::user()->password)) {
            $data->password = Hash::make($request->password);
            $data->save();
            return Redirect::route('user.profile.view')->with('success', 'Password Updated');
        } else {
            return redirect()->back()->with('danger', "Password didn't match");
        }
    }
    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $data = User::find($request->userid);
        $formFields = $request->validate([
            'name' => 'required',
            'mobile' => 'required',
        ]);
        //If user Gieven address
        if ($request->has('address')) {
            $formFields['address'] = $request->address;
        }

        $data->name = $request->name;
        $data->mobile = $request->mobile;
        $data->address = $request->address;

        $data->save();

        return Redirect::route('user.profile.view')->with('success', 'Profile Updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
