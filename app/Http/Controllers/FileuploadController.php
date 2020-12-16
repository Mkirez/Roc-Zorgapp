<?php

namespace App\Http\Controllers;

use App\Models\Fileupload;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FileuploadController extends Controller
{
    public function index()
    {
        $files = Fileupload::all();

        return view('fileupload', ['files' => $files]);

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $file = $request->file('uploadedfile');
        $filedescription = $request->input('description');
        $filename = $file->getClientOriginalName();
        $filename = time(). '.' . $filename;

        $path = $file->storeAs('public', $filename,);
        $path = $file->storeAs('', $filedescription,);

        Fileupload::create([
            'filename' => $path,
        ]);
        
        return redirect('fileupload');
    }

    public function show(Fileupload $fileupload)
    {
        //
    }

    public function edit(Fileupload $fileupload)
    {
        //
    }

    public function update(Request $request, Fileupload $fileupload)
    {
        //
    }

    public function destroy($id)
    {
        $sql = "DELETE FROM fileuploads WHERE id=$id";

        DB::update($sql);
        
        return redirect('fileupload');
    }
}
