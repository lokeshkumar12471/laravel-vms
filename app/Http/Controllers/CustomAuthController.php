<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Request;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function custom_login(Request $request)
    {$request->validate([
        'email' => 'required',
        'password' => 'required',
    ]);
        $credential = $request->only('email', 'password');
        if (FacadesAuth::attempt($credential)) {
            return redirect()->intended('dashboard')->withSuccess('login');
        }
        return redirect('login')->with('error', 'Login Details are not Vaild');
    }
    public function registration()
    {
        return view('auth.registration');
    }
    public function custom_registration(HttpRequest $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $data = $request->all();
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => FacadesHash::make($data['password']),
            'type' => 'Admin',
        ]);
        return redirect('registration')->with('success', 'Registration Complete');
    }
    public function dashboard()
    {
        if (FacadesAuth::check()) {
            return view('dashboard');
        }
        return redirect('login');

    }
}