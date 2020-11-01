@extends('auths.layouts.main')

@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="post" action="{{route('auth.forgot.password.post')}}">
                    @csrf
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            {{\Session::get('success')}}
                        </div>
                    @else
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Email</span>
                    </div>



                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Reset Password
                        </button>
                    </div>




                    <div class="login100-form-social flex-c-m links" >
                        <a href="{{route('auth.signup')}}"> Already have an account Login !</a>
                    </div>
                        @endif
                </form>

                <div class="login100-more" style="background-image: url('images/login.png');">
                </div>
            </div>
        </div>
    </div>
@endsection
