<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Datatables;
use App\Models\User;
use Illuminate\Support\Facades\request;

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
}