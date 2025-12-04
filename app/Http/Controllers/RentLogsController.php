<?php

namespace App\Http\Controllers;

use App\Models\RentLog;
use Illuminate\Http\Request;

class RentLogsController extends Controller
{
    public function index()
    {
        $rentLogs = RentLog::with(['user', 'book'])->get();
        return view('Rent-log', compact('rentLogs'));
    }
}
