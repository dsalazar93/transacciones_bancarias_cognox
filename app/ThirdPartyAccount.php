<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ThirdPartyAccount extends Model
{
    static public function getUserThirdPartyAccounts($user_id){
        $accounts = DB::select("SELECT 
            tpa.id AS third_account_id,
            tpa.account_id,
            a.number,
            u.firstname,
            u.lastname
        FROM
            third_party_accounts AS tpa
                INNER JOIN
            accounts AS a ON tpa.account_id = a.id
                INNER JOIN
            users AS u ON a.user_id = u.id
        WHERE
            tpa.user_id = ?
        AND a.enabled = ?", [$user_id, 1]);

        return $accounts;
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
