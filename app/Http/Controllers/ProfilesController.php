<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\User;

class ProfilesController extends Controller
{
    public function index()
    {
        $students = DB::table('users')->where('user_type', 1)->get();
        dd($students);
        
        return view('profiles.index', compact('students'));
    }

    public function show(User $user)
    {
        return view('profiles.show', compact('user'));
    }

    public function update()
    {
        //
    }
        
    public function destroy($id)
    {
        DB::update("DELETE FROM users WHERE id=$id");

        return view('/welcome');
    }
}
