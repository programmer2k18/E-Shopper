<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class support_messages extends Model
{
    protected $fillable =['name','email','message','subject','phone'];

    public static function addMessage(Request $request ){
        if (auth()->user()){

            support_messages::create([
                'name'=>auth()->user()->name,
                'email'=>auth()->user()->email,
                'subject'=>$request->input('subject'),
                'message'=>$request->input('message'),
                'phone'=>auth()->user()->phone
            ]);
        }
        else{
            support_messages::create([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'subject'=>$request->input('subject'),
                'message'=>$request->input('message'),
                'phone'=>$request->input('phone'),
            ]);
        }
    }
}
