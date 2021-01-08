<?php

namespace App\Http\Controllers;

use App\Models\Qualification_file;
use App\Models\Competition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompetitionController extends Controller
{
    public function store(Request $request)
    {
        Competition::create($this->validateCompetition());

        return back();
    }

    public function update(Request $request, Competition $competition)
    {
        $competition->update($this->validateCompetition());

        return back();
    }

    public function index(Request $request, Competition $competition)
    {
        $competitions = Auth::user()->competitions();
        $qualification_files = Qualification_file::all();

        return view('competitions', compact('qualification_files', 'competitions'));
    }

    public function approveCompetition(Competition $competition)
    {
        if ($competition->achieved == 0) {
            $competition->update(['achieved' => 1]);
        } else {
            $competition->update(['achieved' => 0]);
        }

        return back();
    }

    public function destroy($id)
    {
        $sql = "DELETE FROM competitions WHERE id=$id";

        DB::update($sql);

        return back();
    }

    

    protected function validateCompetition()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'qualification_file_id' => 'required',
            // 'file' => ['file'],
            // 'user_id' => 'required',
            // 'achieved' => 'required',
        ]);

        // if (request('file')) {
        //     $attributes['file'] = request('file')->storeAs('competitions_files', request('file')->getClientOriginalName());
        // }

        return $attributes;
    }
}
