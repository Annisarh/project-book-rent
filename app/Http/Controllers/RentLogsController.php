<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RentLogsController extends Controller
{
    public function index()
    {
        return view('Rent-log');
    }
}
