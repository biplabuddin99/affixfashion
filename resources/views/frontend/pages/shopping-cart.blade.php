@extends('frontend.layout.master')
@section('frontendtitle')
Cart page
@endsection

@section('frontend_contend')
<!-- cart-area start -->
    <div class="cart-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="http://themepresss.com/tf/html/tohoney/cart">
                        <table class="table-responsive cart-wrap">
                            <thead>
                                <tr>
                                    <th class="images">Image</th>
                                    <th class="product">Product</th>
                                    <th class="ptice">Price</th>
                                    <th class="quantity">Quantity</th>
                                    <th class="total">Total</th>
                                    <th class="remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($carts as $cartitem)
                                <tr>
                                    <td>
                                      <img class="img-fluid" src="{{ asset('images/product') }}/{{ $cartitem->options->product_image }}" alt=""/>
                                    </td>
                                    <td>{{ $cartitem->name }}</td>
                                    <td>{{ $cartitem->price }} TK</td>
                                    <td>
                                        <strong class="ps-2">{{ $cartitem->qty }}</strong>
                                    </td>
                                    <td>{{ $cartitem->price*$cartitem->qty  }} TK</td>
                                    <td>
                                        <a href="{{ route('removefrom.cart',['cart_id' => $cartitem->rowId]) }}">
                                            {{-- <i class="ms-3 text-danger bi bi-x-circle-fill"></i> --}}
                                            <i class="fa fa-times text-danger"></i>
                                        </a>
                                    </td>
                                  </tr>
                                @empty           
                                @endforelse
                            </tbody>
                        </table>
                        <div class="row mt-60">
                            <div class="col-xl-4 col-lg-5 col-md-6 ">
                                <div class="cartcupon-wrap">
                                    <ul class="d-flex">
                                        <li>
                                            <button>Update Cart</button>
                                        </li>
                                        <li><a href="shop.html">Continue Shopping</a></li>
                                    </ul>
                                    <h3>Cupon</h3>
                                    <p>Enter Your Cupon Code if You Have One</p>
                                    <div class="cupon-wrap">
                                        <input type="text" placeholder="Cupon Code">
                                        <button>Apply Cupon</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 offset-xl-5 col-lg-4 offset-lg-3 col-md-6">
                                <div class="cart-total text-right">
                                    <h3>Cart Totals</h3>
                                    <ul>
                                        <li><span class="pull-left">Subtotal </span>$380.00</li>
                                        <li><span class="pull-left"> Total </span> $380.00</li>
                                    </ul>
                                    <a href="{{ route('customer.checkoutpage') }}">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- cart-area end -->
@endsection