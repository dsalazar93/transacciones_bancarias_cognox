<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Transfer;

class TransferController extends Controller
{
    /**
     * Show dashboard of transfers
     */
    public function index()
    {
        $transfers = Transfer::getDataTransfers(Auth::id());
        return view('transfers', compact("transfers"));
    }

    // public function getTransfers(){
    //     // return response()->json($transfers);
    //     return response()->json();
    // }
}
