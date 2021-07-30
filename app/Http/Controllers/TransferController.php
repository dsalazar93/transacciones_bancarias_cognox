<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Transfer;
use App\Account;
use App\ThirdPartyAccount;

class TransferController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    private function getMyActiveAccounts(){
        $accounts = Account::where('enabled', 1)->where('user_id', Auth::id())->get();
        return $accounts;
    }

    private function getRegisteredThirdPartyAccounts(){
        $accounts = ThirdPartyAccount::getUserThirdPartyAccounts(Auth::id());
        return $accounts;
    }

    private function runTransfer($request){
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
                return $transfer;
            } else {

                return ['msg' => 'No puedes realizar la transferencia porque el monto es superior al saldo de la cuenta de origen'];
            }
        } else {
            return ['msg' => 'No puedes realizar la transferencia porque el monto es superior al saldo de la cuenta de origen'];
        }
    }
    
    public function index(){
        $transfers = Transfer::getDataTransfers(Auth::id());
        return view('transfers', compact("transfers"));
    }

    public function individual_accounts(){
        $myActiveAccounts = $this->getMyActiveAccounts();
        if($myActiveAccounts->count() > 1){
            return view('accounts', compact('myActiveAccounts'));
        } else if ($myActiveAccounts->count() == 1) {
            return back()->withErrors(['No posees mas de una cuenta para poder hacer transferencias entre productos']);
        } else {
            return back()->withErrors(['No posees ninguna para poder hacer transferencias entre productos']);
        }
    }

    public function send_transfer_myaccount(Request $request){
        $response = $this->runTransfer($request);
        if(isset($response->id)){
            $myActiveAccounts = $this->getMyActiveAccounts();
            $successfulMessage = [
                'content' => "La transacción fue realizada exitosamente el siguiente código: $response->id"
            ];
            return view('accounts', compact('myActiveAccounts', 'successfulMessage'));
        } else if (isset($response['msg'])) {
            return back()->withErrors([$response['msg']]);
        }

    }

    public function third_accounts(){
        $thirdPartyAccounts = $this->getRegisteredThirdPartyAccounts();
        $myActiveAccounts = $this->getMyActiveAccounts();

        if ($myActiveAccounts->count() > 1){
            if(count($thirdPartyAccounts) > 1){
                return view('thirdaccounts', compact('thirdPartyAccounts', 'myActiveAccounts'));
            } else {
                return back()->withErrors(['No tienes cuentas de terceros']);
            }
        } else {
            return back()->withErrors(['No posees cuentas para hacer transferencias']);
        }
    }

    public function sendTransferAnotherAccount(Request $request){
        $response = $this->runTransfer($request);
        if(isset($response->id)){
            $thirdPartyAccounts = $this->getRegisteredThirdPartyAccounts();
            $myActiveAccounts = $this->getMyActiveAccounts();
            $successfulMessage = [
                'content' => "La transacción fue realizada exitosamente el siguiente código: $response->id"
            ];
            return view('thirdaccounts', compact('thirdPartyAccounts', 'myActiveAccounts', 'successfulMessage'));
        } else if (isset($response['msg'])) {
            return back()->withErrors([$response['msg']]);
        }

    }
}
