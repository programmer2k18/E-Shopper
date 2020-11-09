<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Products;
use Illuminate\Support\Facades\DB;
class cart extends Model
{
    protected $fillable =['user_id','product_id','requestQuantity','cost','sellingStatus'];

    public static function cartProducts(){
        $cartData= DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('user_id','=',auth()->user()->id)
            ->where('sellingStatus','=','pending')->get();
        return $cartData;
    }
    public static function deleteCartProducts(){
        cart::where('user_id','=',auth()->user()->id)
            ->where('sellingStatus','=','pending')->delete();
    }
}
