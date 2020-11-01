<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class HomeController extends Controller
{
    public function index(Request  $request){
        return view('welcome');
    }


    public function login(Request $request){
       // $request->session()->put('is_logged_in','aasdfsadfsadf');
        return $request->session()->has('is_logged_in') ? view('welcome') :view('auths.login');
    }
}
