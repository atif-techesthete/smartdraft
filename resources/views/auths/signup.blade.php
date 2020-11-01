@extends('auths.layouts.main')
@section('custom-scripts')
    <script src="{{asset('custom-js/auth.js')}}"></script>
@endsection
@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">


                    <form class="login100-form validate-form"  method="post" action="{{route('auth.signup.post')}}">
                        @if (\Session::has('success'))
                           <div class="alert alert-success">
                               Verification link successfully sent to your email account
                           </div>
                        @else
                        @csrf
                        <div class="wrap-input100 validate-input" data-validate = "Firstname is required">
                            <input class="input100" type="text" value="atif" name="firstname">
                            <span class="focus-input100"></span>
                            <span class="label-input100">Firstname</span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate = "Lastname is required">
                            <input class="input100" type="text"  value="atif" name="lastname">
                            <span class="focus-input100"></span>
                            <span class="label-input100">Lastname</span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                            <input class="input100" type="text"  value="atif@gmail.com" name="email">
                            <span class="focus-input100"></span>
                            <span class="label-input100">Email</span>
                        </div>


                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <input class="input100" type="password"  value="atif" name="password">
                            <span class="focus-input100"></span>
                            <span class="label-input100">Password</span>
                        </div>


                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn">
                                SignUp
                            </button>
                        </div>

                        <div class="login100-form-social flex-c-m links" >
                            <a href="{{route('auth.login')}}"> Already Have an account Login !</a>
                        </div>
                        @endif
                    </form>




                <div class="login100-more" style="background-image: url('images/login.png');">
                </div>
            </div>
        </div>
    </div>
@endsection
