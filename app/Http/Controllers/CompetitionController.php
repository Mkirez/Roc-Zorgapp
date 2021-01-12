<?php

namespace App\Http\Controllers;

use App\Models\Qualification_file;
use App\Models\competition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class competitionController extends Controller
{
    public function store(Request $request)
    {
        competition::create($this->validatecompetition());

        return back();
    }

    public function update(Request $request, competition $competition)
    {
        $competition->update($this->validatecompetition());

        return back();
    }

    public function index(Request $request, competition $competition)
    {
        $competitions = Auth::user()->competitions();
        $qualification_files = Qualification_file::all();

        return view('competitions', compact('qualification_files', 'competitions'));
    }

    public function approvecompetition(competition $competition)
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

    

    protected function validatecompetition()
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
