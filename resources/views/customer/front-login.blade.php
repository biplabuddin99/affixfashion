@extends('frontend.layout.master')
@section('frontendtitle') Login @endsection
@section('frontend_contend')
    <!-- front-login-area start -->
    <div class="account-area ptb-100">
        <div class="container">
            <form action="{{route('frontlogin.check')}}" method="post">
                @csrf
                <div class="row">
                    @if(Session::has('response'))
                    {!!Session::get('response')['message']!!}
                    @endif
                    <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                        <div class="account-form form-style">
                            <p>Phone Number</p>
                            <input type="text">
                            <p>Password <span class="text-danger">*</span></p>
                            <input type="Password">
                            {{-- <div class="row">
                                <div class="col-lg-6">
                                    <input id="password" type="checkbox">
                                    <label for="password">Save Password</label>
                                </div>
                                <div class="col-lg-6 text-right">
                                    <a href="#">Forget Your Password?</a>
                                </div>
                            </div> --}}
                            <button>SIGN IN</button>
                            <div class="text-center">
                                <button><a href="{{ route('front.register') }}">Or Creat an Account</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- front-login-area end -->
@endsection