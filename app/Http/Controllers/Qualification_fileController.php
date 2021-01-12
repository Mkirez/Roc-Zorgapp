<?php

namespace App\Http\Controllers;

use App\Models\Qualification_file;
use App\Models\File;
use App\Models\competition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Qualification_fileController extends Controller
{
    public function index()
    {
        // if (Auth::user()->student()) {
            $files = Qualification_file::all(); // student sees all qualification_files

        // } else {

        //     $files = Auth::user()->qualification_files(); // education sees only his/hers qualification files
        // }

        return view('qualification_file.index', compact('files'));
    }

    public function store()
    {
        Qualification_file::create($this->validateQualification_file());

        return back();
    }

    public function show(Qualification_file $qualification_file)
    {
        $competitions = $qualification_file->competitions->sortBy('name');
        $student_files = auth()->user()->student_files();

        return view('qualification_file.show', compact('qualification_file', 'competitions', 'student_files')); 
    }

    public function update(Qualification_file $qualification_file)
    {
        $qualification_file->update($this->validateQualification_file());

        return back();
    }

    public function destroy($id)
    {
        $sql = "DELETE FROM qualification_files WHERE id=$id";

        DB::update($sql);

        return back();
    }

    protected function validateQualification_file()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'file' => ['file'],
            'user_id' => 'required',
        ]);
        
        if (request('file')) {
            $attributes['file'] = request('file')->storeAs('qualification_files', request('file')->getClientOriginalName());
        }

        return $attributes;
    }
}
