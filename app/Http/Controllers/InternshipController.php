<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class InternshipController extends Controller
{
    public function store(Request $request)
    {
        auth()->user()->intern(User::find($request->bpv));
        return back();
    }
}
