<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transfer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'source_account', 'target_account', 'amount', 'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    static public function getDataTransfers($user_id){
        $transfers = DB::select("SELECT 
            id AS codigo,
            source_account AS cuenta_origen,
            target_account AS cuenta_destino,
            amount AS monto,
            created_at AS fecha
        FROM
            transfers
        WHERE
            transfers.user_id = ?
        ", [$user_id]);

        return $transfers;
    }
}
