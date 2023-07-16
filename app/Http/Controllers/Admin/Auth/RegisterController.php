<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register()
    {
        return view('admin.auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:4|max:255',
            'email' => 'required|string|email|max:255|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'roles' => 'required',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ], [
            'name.required' => ' Username is required',
            'email.required' => 'Email Id is required',
            'roles.required' => 'Roles is required',
            'password.required' => 'Password is required',
            'password_confirmation.required' => 'Confirm Password is required',
        ]);

        $data = new User();

        $data->name = $request->get('name');
        $data->email = $request->get('email');
        $data->roles = $request->get('roles');
        $data->password = Hash::make($request->get('password'));
        $data->created_at = date("Y-m-d H:i:s");
        $data->save();

        $update = [
            'inserted_by' => $data->id,
        ];

        User::where('id', $data->id)->update($update);

        return redirect('/admin/login')->with('message', 'Admin Member Register Sucessfully.');
    }
}
