<?php

namespace App\Http\Controllers;

use App\Models\Fileupload;
use App\Models\Qualification_file;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Qualification_fileController extends Controller
{
    public function index()
    {
        $files = Auth::user()->qualification_files();

        return view('qualification_file', compact('files'));

    }

    public function create()
    {
        //
    }

    public function store()
    {
        Qualification_file::create($this->validateQualification_file());

        return back();
    }

    public function show()
    {
        //
    }

    public function edit()
    {
        //
    }

    public function update()
    {
        //
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
            'file' => 'required',
            'user_id' => 'required',
            'total_number_of_competitions' => 'required',
        ]);

        $attributes['file'] = request('file')->store('qualification_files');

        return $attributes;
    }
}
