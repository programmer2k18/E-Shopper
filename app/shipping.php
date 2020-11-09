<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class shipping extends Model
{
    public static function insertShipping(Request $request){
        $shipping_id = DB::table('shippings')->insertGetId([
            'email'=>$request->input('email'),
            'company_name'=>$request->input('company'),
            'fname'=>$request->input('fname'),
            'lname'=>$request->input('lname'),
            'address1'=>$request->input('address1'),
            'address2'=>$request->input('address2'),
            'mobile_number'=>$request->input('mobile_number'),
            'notes'=>$request->input('notes'),
            'created_at'=>date('y-m-d h:m:s'),
            'updated_at'=>date('y-m-d h:m:s')
        ]);
        return $shipping_id;
    }
    public static function updateShipping(Request $request,$id){
        DB::table('shippings')->
        where('shipping_id','=',$id)->update([
            'email'=>$request->input('email'),
            'company_name'=>$request->input('company'),
            'fname'=>$request->input('fname'),
            'lname'=>$request->input('lname'),
            'address1'=>$request->input('address1'),
            'address2'=>$request->input('address2'),
            'mobile_number'=>$request->input('mobile_number'),
            'notes'=>$request->input('notes'),
            'created_at'=>date('y-m-d h:m:s'),
            'updated_at'=>date('y-m-d h:m:s')
        ]);
    }
}
