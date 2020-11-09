<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class products_by_users extends Model
{
    protected $fillable=['product_name','description','selling_address','user_id',
        'user_name','colors','sizes','currency','tags','category','status',
        'publication_status','price','quantity','image'];

    public static function createOrder(Request $request,$imagePath){
        products_by_users::create([
            'product_name'=>$request->input('product-name'),
            'description'=>$request->input('description'),
            'selling_address'=>$request->input('selling_area'),
            'user_id'=>auth()->user()->id,
            'user_name'=>auth()->user()->name,
            'colors'=>$request->input('colors'),
            'sizes'=>$request->input('size'),
            'currency'=>$request->input('currency'),
            'tags'=>$request->input('tags'),
            'category'=>$request->input('category'),
            'status'=>$request->input('status'),
            'publication_status'=>"pending",
            'price'=>$request->input('price'),
            'quantity'=>$request->input('quantity'),
            'image'=>$imagePath
        ]);
    }

    public static function allActiveOrders(){
        return products_by_users::where('publication_status','=','active')
            ->latest()->paginate(5);
    }

    public function emailAddress(){
        return $this->belongsTo('app\User','user_id','id');
    }
}
