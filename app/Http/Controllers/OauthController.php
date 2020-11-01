<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class OauthController extends Controller{

    public function oauth_redirect(Request  $request,$provider){
        return Socialite::driver($provider)->redirect();
    }

    public function oauth_callback(Request $request,$provider,$code=null){


        $response = Socialite::driver($provider)->stateless()->user();
        dd($response);
        return;

    }
}
