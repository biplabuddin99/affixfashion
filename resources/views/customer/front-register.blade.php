@extends('frontend.layout.master')
@section('frontendtitle') Register @endsection
@section('frontend_contend')
    <!-- register-area start -->
    <div class="account-area ptb-100">
        <div class="container">
            <form class="form" method="post" action="{{route('customer.store')}}">
                @csrf
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                        <div class="account-form form-style">
                            <p>User Name</p>
                            <input type="text">
                            <p>Phone Number <span class="text-danger">*</span></p>
                            <input type="text">
                            <p>Password <span class="text-danger">*</span></p>
                            <input type="Password">
                            <p>Confirm Password <span class="text-danger">*</span></p>
                            <input type="Password">
                            <button>Register</button>
                            <div class="text-center">
                                <button><a href="login.html">Or Login</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- register-area end -->

@endsection