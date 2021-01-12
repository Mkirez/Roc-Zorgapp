<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\competition;
use App\Models\Log;
use App\Models\Student_file;

class ApproveController extends Controller
{
    public function approveLog(Log $log)
    {
        if ($log->confirmed == 0) {
            $log->update(['confirmed' => 1]);
        } else {
            $log->update(['confirmed' => 0]);
        }

        return back();
    }
}
