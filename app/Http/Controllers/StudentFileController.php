<?php

namespace App\Http\Controllers;

use App\Models\competition;
use App\Models\Student_file;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentFileController extends Controller
{
    public function store(Request $request)
    {
        Student_file::updateOrCreate(['competition_id' => $request->competition_id], $this->validateFile());

        return back();
    }

    public function update(Student_file $student_file)
    {
        if ($student_file->achieved == 0) {
            $student_file->update(['achieved' => 1]);
        } else {
            $student_file->update(['achieved' => 0]);
        }

        return back();
    }

    public function destroy($id)
    {
        $sql = "DELETE FROM student_files WHERE id=$id";

        DB::update($sql);

        return back();
    }

    protected function validateFile()
    {
        $attributes = request()->validate([
            'file' => ['file'],
            'user_id' => 'required',
            'competition_id' => 'required',
            'achieved' => 'required',
        ]);

        if (request('file')) {
            $attributes['file'] = request('file')->storeAs('competitions_files', request('file')->getClientOriginalName());
        }

        return $attributes;
    }
}
