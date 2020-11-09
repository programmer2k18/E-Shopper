<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Payment extends Model
{
    protected $fillable = ['payment_method','payment_status','created_at'];
    public static function insertPayment($method){
        return DB::table('payments')->insertGetId([
            'payment_method'=>$method,
            'payment_status'=>'pending',
            'created_at'=>date('y:m:d h:m:s')
        ]);
    }
}
