<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Transfer;
use App\Account;

class TransferController extends Controller
{
    
    private function getMyActiveAccounts(){
        $accounts = Account::where('enabled', 1)->where('user_id', Auth::id())->get();
        return $accounts;
    }
    /**
     * Show dashboard of transfers
     */
    public function index()
    {
        $transfers = Transfer::getDataTransfers(Auth::id());
        return view('transfers', compact("transfers"));
    }

    public function individual_accounts(){
        $myActiveAccounts = $this->getMyActiveAccounts();
        if($myActiveAccounts->count() > 1){
            return view('accounts', compact('myActiveAccounts'));
        } else {
            return back()->withErrors(['No posees mas de una cuenta para poder hacer transferencias entre productos']);
        }
    }

    public function send_transfer_myaccount(Request $request){
        // dd($request->all());
        $balanceOrigin = Account::where('id', $request->input('origin_account'))->get(['balance'])->toArray();
        $balanceOrigin = $balanceOrigin[0]['balance'];
        if ($balanceOrigin >= $request->input('amount')){
            $targetAccount = Account::find($request->input('target_account'));
            $targetAccount->balance = $request->input('amount') + $targetAccount->balance;
            $targetAccount->save();

            $originAccount = Account::find($request->input('origin_account'));
            $originAccount->balance = $originAccount->balance - $request->input('amount');
            $originAccount->save();
            
            if ($targetAccount->wasChanged() && $originAccount->wasChanged()){
                $transfer = new Transfer;
                $transfer->source_account = $originAccount->number;
                $transfer->target_account = $targetAccount->number;
                $transfer->amount = $request->input('amount');
                $transfer->user_id = Auth::id();
                $transferSaved = $transfer->save();

                if($transferSaved){
                    $myActiveAccounts = $this->getMyActiveAccounts();
                    $successfulMessage = [
                        'content' => "La transacción fue realizada exitosamente el siguiente código: $transfer->id"
                    ];
                    return view('accounts', compact('myActiveAccounts', 'successfulMessage'));
                } else {
                    return back()->withErrors(['Ha ocurrido un error, intentalo mas tarde']);
                }
            }
        } else {
            return back()->withErrors(['No puedes realizar la transferencia porque el monto es superior al saldo de la cuenta de origen']);
        }
    }
}
