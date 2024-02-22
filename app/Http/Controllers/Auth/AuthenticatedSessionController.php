<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\StaffAuth\LoginRequest as LoginRequest2;
use App\Http\Controllers\Staff\Auth\AuthenticatedSessionController as AuthenticatedSessionController2;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login2');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store1(LoginRequest $request, LoginRequest2 $request2)
    {
        $email_address = $request->email;
        $emailSuffix = substr(strstr($email_address, '@'), 1);
        if ($emailSuffix == 'just.edu.bd') {
            $AuthenticatedSessionController2 = new AuthenticatedSessionController2();
            return $AuthenticatedSessionController2->store($request2);
        } elseif ($emailSuffix == 'student.just.edu.bd') {
            return $this->store($request);
        } elseif ($emailSuffix == 'gmail.com') {
            return $this->store($request);
        } else {
            return redirect()->back()->with('danger', 'Please Use A Valid Email!');
        }
    }
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
