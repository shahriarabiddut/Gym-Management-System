<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\Contact;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException;

class HomeController extends Controller
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
    public function contact()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function contactStore(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);
        $data = new Contact();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->message = $request->message;
        $data->save();

        return redirect()->route('contact')->with('success', 'Contact Message Sent!');
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

    public function apiData(string $id)
    {
        $roll = $id;
        $session = substr($roll, 0, 2);
        $dept = substr($roll, 2, 2);
        switch ($dept) {
            case 01:
                $department = 'CSE';
                break;
            default:
                $department = 'CSE';
                break;
        }
        $username = "marufsiddiki99@gmail.com";
        $password = "passwordmaruf";

        // Set the URL of the login endpoint
        $login_url = "https://students.just.edu.bd:5000/api/v1/adminlogin";
        // Create a new cURL resource
        $ch = curl_init();

        // Set the cURL options
        curl_setopt($ch, CURLOPT_URL, $login_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array(
            'email' => $username,
            'password' => $password,
            'remember' => 'true'
        )));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the request
        $response = curl_exec($ch);

        // Check for errors
        if ($response === false) {
            echo 'cURL error: ' . curl_error($ch);
        } else {
            // Process the response
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($http_code != 200) {
                echo "Login failed with HTTP code: " . $http_code;
            }
        }
        $responseData1 = json_decode($response, true);
        $bearerToken = $responseData1['token'];
        // Close cURL resource
        curl_close($ch);

        // 2nd REquest 
        // API endpoint URL
        $apiUrl = 'https://students.just.edu.bd:5000/api/v1/admin/searchStudents?dept=' . $department . '&session=20' . $session . '-' . $session + 1;

        // Initialize cURL session
        $curl = curl_init();

        // Set the cURL options
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer ' . $bearerToken,
            'Content-Type: application/json' // Adjust content type if necessary
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        // Execute the cURL session
        $response = curl_exec($curl);

        // Check for errors
        if ($response === false) {
            echo 'Error: ' . curl_error($curl);
        } else {
            // Decode the JSON response
            $responseData = json_decode($response, true);
            $data = $responseData['students'];

            // Check if the response is empty
            if (empty($responseData)) {
                echo 'Error: Empty response from the server';
            } else {
                foreach ($data as $value) {
                    if ($value['roll'] == $roll) {
                        return $value;
                        // dd($value);
                        foreach ($value as $Mvalue) {
                            // echo $Mvalue . '<br>';
                        }
                    }
                }
            }
        }

        // Close cURL session
        curl_close($curl);
    }
}
