<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Order_Details extends Model
{
    public static function insertOrderDetails($cartProducts,$orderId){

        foreach ($cartProducts as $product){
            DB::table('order__details')->insert([
                'orderId'=>$orderId,
                'productId'=>$product->product_id,
                'cost'=>$product->cost,
                'requestQuantity'=>$product->requestQuantity,
                'created_at'=>date('y:m:d h:m:s')
            ]);
        }
    }

    public static function topTenIds(){
        return DB::table('order__details')
            ->select('productId', DB::raw('COUNT(productId) AS occurrences'))
            ->groupBy('productId')
            ->orderBy('occurrences', 'DESC')
            ->limit(10)
            ->get();
    }
}

