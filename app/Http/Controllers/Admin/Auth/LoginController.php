<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('/admin/dashboard');
        } else {
            return view('admin.auth.login');
        }
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email|max:255|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password' => 'required|string',
        ], [
            'email.required' => 'Email Id is required',
            'password.required' => 'Password is required',
        ]);

        $credentials = $request->only('email', 'password', 'remember');

        if (auth()->guard('web')->attempt($credentials)) {

            return redirect()->intended('/admin/dashboard')->with('message', 'Admin Member login Successfully.');
        } else {
            return redirect()->back()->with(['Input' => $request->only('email', 'password'), 'error' => 'Admin Member Email id and Password do not match our records!']);
        }
    }


    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Admin Member logout Successfully.');
    }
}
