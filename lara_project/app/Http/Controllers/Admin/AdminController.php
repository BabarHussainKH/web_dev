<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use Illuminate\Support\Facades\Hash as FacadesHash;
use AuthenticatesUsers;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.login');
    }


    public function validateLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(array_merge($credentials, ['user_role' => 'admin']))) {
            return redirect()->intended('admin/dashboard');
        } else

            return redirect()->back()->withErrors(['email' => 'User credentials are incorrect']);
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }


    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => FacadesHash::make($input['password']),
            'user_role' => 'admin'

        ]);
        return view('admin.thank');
    }
}
