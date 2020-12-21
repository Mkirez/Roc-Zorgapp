<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

use App\Models\User;

class ProfilesController extends Controller
{
    public function index()
    {
        $students = DB::table('users')->where('user_type', 1)->get();

        // dd($students);
        
        return view('profiles.index', compact('students'));
    }

    public function show(User $user)
    {
        return view('profiles.show', compact('user'));
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'name' => ['string', 'required', 'max:255'],
            'organization' => ['string'],
            'email' => ['string', 'required', 'email', Rule::unique('users')->ignore($user)],
            'password' => ['string', 'required', 'min:8', 'max:255', 'confirmed'],
            'user_type' => ['required'],
        ]);
        
        $attributes['password'] = bcrypt($attributes['password']);
        
        $user->update($attributes);

        return back();
    }
        
    public function destroy($id)
    {
        DB::update("DELETE FROM users WHERE id=$id");

        return view('/welcome');
    }
}