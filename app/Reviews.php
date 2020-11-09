<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    protected $fillable = ['user_id','product_id','rating','review','name'];

    public static function allReviewsForProduct($id){
        return Reviews::where('product_id','=',$id)->orderBy('created_at','ASC')->get();
    }
    public static function deleteById($id){
        Reviews::where('product_id','=',$id)->delete();
    }
}
