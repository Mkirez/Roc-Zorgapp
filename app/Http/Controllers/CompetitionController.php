<?php

namespace App\Http\Controllers;

use App\Models\Qualification_file;
use App\Models\Competition;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function store()
    {
        Competition::create($this->validateCompetition());

        return back();
    }

    protected function validateCompetition()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'file' => 'required',
            'user_id' => 'required',
            'achieved' => 'required',
            'qualification_file_id' => 'required',
        ]);

        $attributes['file'] = request('file')->store('competitions_files');

        return $attributes;
    }
}
