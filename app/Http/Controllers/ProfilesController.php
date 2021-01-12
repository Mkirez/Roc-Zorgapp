<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Qualification_file;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

use App\Models\User;

class ProfilesController extends Controller
{
    public function index()
    {
        if (Auth::user()->education()) {
            $students = User::where('user_type', 1)->get();
            // dd($students);
        } elseif (Auth::user()->bpv()) {
            $students = Auth::user()->interns;
        }
        return view('profiles.index', compact('students'));
    }

    public function show(User $user)
    {
        $bpvs = DB::table('users')->where('user_type', 2)->get();
        $student_files = $user->student_files();
        if (Qualification_file::all()->count() > 0){
            $competitions = Qualification_file::find(1)->competitions;
        } else {
            $competitions = [];
        }
        $logs = collect($user->logs()->where('bpv_id', Auth::user()->id));

        return view('profiles.show', compact('user', 'bpvs', 'student_files', 'competitions', 'logs'));
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'name' => ['string', 'required', 'max:255'],
            'organization' => ['required_if:user_type,==,2'],
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
