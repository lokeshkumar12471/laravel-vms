<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Hash as FacadesHash;

class CustomAuthController extends Controller
{
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
}