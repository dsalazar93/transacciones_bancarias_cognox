<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransferController extends Controller
{
    /**
     * Show dashboard of transfers
     */
    public function index()
    {
        return view('transfers');
    }
}
