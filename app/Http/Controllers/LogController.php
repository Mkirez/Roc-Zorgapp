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

        return view('log', compact('logs'));
    }

    public function store()
    {
        Log::create($this->validateLog());

        return back();
    }

    public function update(Log $log)
    {
        $log->update($this->validateLog());

        return back();
    }

    public function destroy($id)
    {
        DB::update("DELETE FROM logs WHERE id=$id");
        
        return back();
    }

    public function approveLog(Log $log)
    {
        if ($log->confirmed == 0) {
            $log->update(['confirmed' => 1]);
        } else {
            $log->update(['confirmed' => 0]);
        }

        return back();
    }

    protected function validateLog()
    {
        return request()->validate([
            'description' => 'required',
            'hours' => 'required|integer',
            'date' => 'required',
            'user_id' => 'required',
            'confirmed' => 'required',
        ]);
    }
}