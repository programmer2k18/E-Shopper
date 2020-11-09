<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\support_messages;
class contactUsController extends Controller
{
    public function showForm(){
        return view('pages.contact-us');
    }

    protected function ValidateRequest(Request $request){
        if(auth()->user()){
            $this->validate($request,[
                'subject'=>'required|string',
                'message'=>'required|string'
            ]);
        }
        else{
            $this->validate($request,[
                'name'=>'required|string',
                'email'=>'required|email|string',
                'subject'=>'required|string',
                'message'=>'required|string',
                'phone'=>'required|'
            ]);
        }
    }

    public function contactUs(Request $request){
        $this->ValidateRequest($request);
        support_messages::addMessage($request);

        return redirect(route('showForm'))
            ->with('message_sent','Your Message has been sent. We will contact you as soon as possible');

    }
}
