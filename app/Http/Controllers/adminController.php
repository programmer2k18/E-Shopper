<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin'])->except('redirectUser');
    }

    public function show_dashboard(){
        return view('admin.dashboard');
    }

    public function redirectUser(){
        if(auth()->user()->isAdmin)
            return redirect(route('dashboard'));
        else
            return redirect(route('showCart'));
    }

}
