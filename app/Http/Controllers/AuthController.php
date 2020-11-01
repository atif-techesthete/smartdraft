<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){

        if($request->method() == 'POST'){
            dd($request->all());
           return;
        }
        return $request->session()->has('is_logged_in') ? view('welcome') :view('auths.login');
    }

    public function signup(Request $request){
        if($request->method() == 'POST'){

            return redirect()->back()->with('success', 'Registeration done successfully');
        }
        return $request->session()->has('is_logged_in') ? view('welcome')
            :view('auths.signup')->with(['action'=>'form']);
    }

    public function forgot_password(Request $request){
        if($request->method() == 'POST'){

            return redirect()->back()->with('success','Reset Password link successfully sent to your registered email account');
        }
        return $request->session()->has('is_logged_in') ? view('welcome') :view('auths.forgotpassword');
    }
}
