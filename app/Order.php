<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Order extends Model
{
    public static function insertOrder($userId,$shippingId,$paymentId,$total){
        return DB::table('orders')->insertGetId([
            'userId'=>$userId,
            'shippingId'=>$shippingId,
            'paymentId'=>$paymentId,
            'total'=>$total,
            'status'=>'pending',
            'created_at'=>date('y:m:d h:m:s')
        ]);
    }
}
