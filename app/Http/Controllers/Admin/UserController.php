<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return view('admin.user.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $formFields = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users|regex:/(.+)@(.+)\.(.+)/i',
            'password' => 'required | min:6',
            'mobile' => 'required',
            'type' => 'required',
        ]);

        //If user Gieven address
        if ($request->has('address')) {
            $formFields['address'] = $request->address;
        }
        //Hash Password
        $formFields['password'] = bcrypt(($formFields['password']));

        User::create($formFields);
        return redirect()->route('admin.user.index')->with('success', 'Data has been added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = User::find($id);
        $membership = Member::all()->where('user_id', '=', $id)->first();
        return view('admin.user.show', ['data' => $data, 'membership' => $membership]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = User::find($id);
        return view('admin.user.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $data = User::find($id);
        $formFields = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'type' => 'required',
        ]);

        //If user Gieven address
        if ($request->has('address')) {
            $formFields['address'] = $request->address;
        }

        $data->update($formFields);
        return redirect()->route('admin.user.index')->with('success', 'Data has been updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect('admin/user')->with('danger', 'Data has been deleted Successfully!');
    }
    // Import Bilk users from csv
    public function importUser()
    {
        return view('admin.user.importUser');
    }

    public function handleImportUser(Request $request)
    {
        $validator = $request->validate([
            'file' => 'required',
        ]);
        $file = $request->file('file');
        $csvData = file_get_contents($file);
        $rows = array_map("str_getcsv", explode("\n", $csvData));
        $header = array_shift($rows);
        $length = count($rows);
        $errorEmails = [];
        foreach ($rows as $key => $row) {
            if ($key != $length - 1) {
                $row = array_combine($header, $row);
                $email = $row['email'];
                $data = User::where('email', $email)->first();
                if ($data == null) {
                    $UserData =  User::create([
                        'name' => $row['name'],
                        'email' => $row['email'],
                        'password' => bcrypt($row['email']),
                    ]);
                } else {
                    $errorEmails[] = $email;
                }
            }
        }
        if ($errorEmails == null) {
            return redirect()->route('admin.user.index')->with('success', 'User Data has been imported Successfully!');
        } else {
            return redirect()->route('admin.user.index')->with('success', 'User Data has been imported Successfully!')->with('danger-email', $errorEmails);
        }
    }
}
