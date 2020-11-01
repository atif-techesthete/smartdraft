@extends('auths.layouts.main')

@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="post" action="{{route('auth.login.post')}}">
					@csrf
                    <span class="login100-form-title p-b-43">
						Login to continue

					</span>


                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Email</span>
                    </div>


                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                    </div>

                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>

                        <div>
                            <a href="{{route('auth.forgot.password')}}" class="txt1">
                                Forgot Password?
                            </a>
                        </div>
                    </div>


                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							or login using
						</span>
                    </div>


                    <div class="login100-form-social flex-c-m links" >

                        <a href="{{route('ouath.redirect',['provider'=>'zendesk'])}}" class="social_bt google"><img src="{{asset('images/login-page-icons/zendesk-icon.png')}}" style="width: 50px;height: 50px"/></a>

                        <a href="{{route('ouath.redirect',['provider'=>'google'])}}" class="social_bt google"><img src="{{asset('images/login-page-icons/google.svg')}}" style="width: 50px;height: 50px"/> </a>
                        <a href="{{route('ouath.redirect',['provider'=>'office365'])}}" class="social_bt google"><img src="{{asset('images/login-page-icons/microsoft.png')}}" style="width: 50px;height: 50px"/> </a>


                    </div>
                    <div class="login100-form-social flex-c-m links" >
                        <a href="{{route('auth.signup')}}"> Don't have an account SignUp !</a>
                    </div>
                </form>


                <div class="login100-more" style="background-image: url('images/login.png');">
                </div>
            </div>
        </div>
    </div>
@endsection
