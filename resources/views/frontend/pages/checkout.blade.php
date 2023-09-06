@extends('frontend.layout.master')
@section('frontendtitle') Checkout Page @endsection
@section('frontend_contend')
 <!-- checkout-area start -->
    <div class="checkout-area ptb-100">
        <div class="container">
            <form action="#" method='post'>
                <div class="row">
                    <div class="col-lg-8">
                        @csrf
                        <div class="row">
                            <div class="col-12 w-100 mt-1">
                                <h3>Shipping Details</h3>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Full Name</label>
                                    <input type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}" placeholder="Enter Your Full Name"
                                    />
                                    @if($errors->has('full_name'))
                                        <small class="d-block text-danger">
                                            {{$errors->first('full_name')}}
                                        </small>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Mobile Number</label>
                                    <input type="number" class="form-control @error('contact') is-invalid @enderror" id="exampleInputEmail1" name="contact" value="{{ old('contact') }}" placeholder="Enter Your Phone Number"/>
                                    @if($errors->has('contact'))
                                    <small class="d-block text-danger">
                                        {{ $errors->first('contact') }}
                                    </small>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>    
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" name="email" value="{{ old('email') }}" placeholder="Enter Your Email" />
                                    @if($errors->has('email'))
                                    <small class="d-block text-danger">
                                        {{ $errors->first('email') }}
                                    </small>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Location</label>
                                    <select name="district_id" class="form-select @error('district_id') is-invalid @enderror">
                                        <option value="">Select a district</option>
                                        {{-- @foreach ($districts as $district)
                                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                                        @endforeach --}}
                                    </select>
                                    @if($errors->has('shipping_address'))
                                    <small class="d-block text-danger">
                                        {{ $errors->first('shipping_address') }}
                                    </small>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Shipping Address</label>
                                    <input type="text" class="form-control @error('shipping_address') is-invalid @enderror" id="exampleInputEmail1" name="shipping_address" value="{{ old('shipping_address') }}" placeholder="Enter Your Place" />
                                    @if($errors->has('shipping_address'))
                                    <small class="d-block text-danger">
                                        {{ $errors->first('shipping_address') }}
                                    </small>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Order Note</label>
                                    <textarea class="form-control @error('order_note') is-invalid @enderror"
                                    id="exampleInputEmail1" name="order_note" placeholder="Notes about Your Order, e.g.Special Note for Delivery"></textarea>
                                    @if($errors->has('order_note'))
                                    <small class="d-block text-danger">
                                        {{ $errors->first('order_note') }}
                                    </small>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="order-area">
                            <table class="table">
                                <thead>
                                <tr colspan="2">
                                    <th scope="col"><h3>Your Order</h3></th>
                                </tr>
                                    @foreach ($carts as $item)
                                    <tr>
                                        <td>{{ $item->name }} X {{ $item->qty }} </td>
                                        <td> {{ $item->price*$item->qty }} Dhm</td>
                                    </tr>
                                    @endforeach
                                </thead>
                                <tbody class="shippingdata">

                                    @if (Session::has('coupon'))
                                    <tr>
                                        <td>Subtotal</td>
                                        <td> {{ $total_price }} BDT</td>
                                    </tr>
                                    <tr>
                                        <td>Discount</td>
                                        <td> (-) {{ Session::get('coupon')['discount'] }} Dhm</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td> {{ Session::get('coupon')['balance'] }} Dhm<del class="text-danger"> ৳{{ Session::get('coupon')['cart_total'] }} Dhm</del></td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td>Subtotal</td>
                                        <td> {{ $total_price }} BDT</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td> {{ $total_price }} BDT</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td>
                                            <input id="toggle1" type="checkbox">
                                            <label for="toggle1">Direct Bank Transfer</label>
                                            <div class="create-account">
                                                <p><b>Acc:01741414141</b> please payment this account and give me code.</p>
                                                <span>Bank Transaction Code</span>
                                                <input type="text">
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- <tr>
                                        <td>
                                            <input id="card" type="checkbox">
                                            <label for="card">Credit Card</label>
                                        </td>
                                    </tr> --}}
                                    <tr>
                                        <td>
                                            <input id="delivery" name="payment_method" value="Cash" type="checkbox">
                                            <label for="delivery">Cash on Delivery</label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="submit">Place Order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- checkout-area end -->
@endsection