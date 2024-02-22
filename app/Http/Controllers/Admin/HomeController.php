<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\SiteOption;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('admin.dashboard');
    }
    public function editSetting()
    {
        $datas = SiteOption::all();
        return view('admin.settings.edit', ['datas' => $datas]);
    }
    public function updateSetting(Request $request, $id)
    {
        //
        $data = SiteOption::find($id);
        $request->validate([
            'value' => 'required',
        ]);
        $data->value = $request->value;
        $data->save();

        return redirect('admin/settings')->with('success', 'Settings has been updated Successfully!');
    }
    public function view()
    {
        return view('admin.layouts.view', [
            'user' => Auth::guard('admin')->user(),
        ]);
    }

    public function edit()
    {
        return view('admin.layouts.edit', [
            'user' => Auth::guard('admin')->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $data = Admin::find($request->userid);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $data->name = $request->name;
        $data->email = $request->email;

        $data->save();
        return Redirect::route('admin.profile.view')->with('success', 'Profile Updated');
    }
    public function contact()
    {
        $data = Contact::all();
        return view('admin.contact.index', ['data' => $data]);
    }
    public function contactDelete(string $id)
    {
        $data = Contact::find($id);
        if ($data == null) {
            return redirect()->route('admin.contact.index')->with('danger', 'Contact Message Not Found');
        }
        $data->delete();
        return redirect()->route('admin.contact.index')->with('danger', 'Contact Message Deleted');
    }
}
