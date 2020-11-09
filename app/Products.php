<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Products extends Model
{
    public function category(){
        return $this->belongsTo('app\Category');
    }
    public function brand(){
        return $this->belongsTo('app\manufacture');
    }

    public static function Top10Products($testIds){
        return DB::table('products')->
        select(['id','name','image','price','currency'])
            ->whereIn('id',$testIds)->get();
    }

    public static function searchForProducts($word){
        return Products::where('name','LIKE','%'.$word.'%')->get();
    }
}
