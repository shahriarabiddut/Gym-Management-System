<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class ProviderController extends Controller
{
    //
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    public function callback($provider)
    {
        $SocialUser = Socialite::driver($provider)->user();
        $email_address = $SocialUser->email;
        $emailSuffix = substr(strstr($email_address, '@'), 1);
        if ($emailSuffix == 'just.edu.bd') {
            $user = User::updateOrCreate([
                'provider_id' => $SocialUser->id,
                'provider' => $provider,
                'type' => 'teacher'
            ], [
                'name' => $SocialUser->name,
                'email' => $SocialUser->email,
                'provider_token' => $SocialUser->token,
            ]);

            Auth::login($user);

            return redirect()->route('root');
        } elseif ($emailSuffix == 'student.just.edu.bd') {
            $user = User::updateOrCreate([
                'provider_id' => $SocialUser->id,
                'provider' => $provider,
                'type' => 'student'
            ], [
                'name' => $SocialUser->name,
                'email' => $SocialUser->email,
                'provider_token' => $SocialUser->token,
            ]);

            Auth::login($user);

            return redirect()->route('root');
        } else {
            return redirect()->back()->with('danger', 'Please Use A Valid Email!');
        }

        // $user->token
    }
}
