<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    public function index()
    {
        $logs = Auth::user()->logs();

        return view('student.log', ['logs' => $logs]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Log::create($this->validateLog());

        return back();
    }

    public function show(Log $ureninfo)
    {
        //
    }

    public function edit(Log $ureninfo)
    {
        //
    }

    public function update(Request $request, Log $ureninfo)
    {
        //
    }

    public function destroy($id)
    {
        $sql = "DELETE FROM logs WHERE id=$id";

        DB::update($sql);
        
        return back();
    }

    protected function validateLog()
    {
        return request()->validate([
            'description' => 'required',
            'hours' => 'required',
            'date' => 'required',
            'user_id' => 'required',
            'confirmed' => 'required',
        ]);
    }
}
