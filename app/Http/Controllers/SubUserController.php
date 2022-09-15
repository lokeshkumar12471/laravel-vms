<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Datatables;
use App\Models\User;
use Illuminate\Http\request;
use Illuminate\Support\Facades\Hash;

class SubUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('sub_user');
    }
    public function fetchall(Request $request)
    {
        if ($request->ajax()) {
            $data = User::where('type', '=', 'User')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<a href="/sub_user/edit/' . $row->id . '" class="btn btn-primary btn-sm">Edit</a>&nbsp;<button type="button" class="btn btn-danger btn-sm delete" data-id="' . $row->id . '">Delete</button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function add()
    {
        return view('add_sub_user');
    }
    public function add_validation(Request $request)
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
            'password' => Hash::make($data['password']),
            'type' => 'User',
        ]);
        return redirect()->route('sub_user')->with('success', 'New User Added');
    }
}