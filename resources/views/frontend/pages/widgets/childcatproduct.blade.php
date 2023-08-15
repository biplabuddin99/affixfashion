@extends('frontend.layout.master')
@section('frontendtitle')
Product
@endsection
@section('frontend_contend')
    <!--best seller product-area start -->
    <div class="product-area product-area-2 mt-3">
        <div class="fluid-container">
            <ul class="row">
                @forelse ($product as $p){{$p->category}}
                <li class="col-xl-2 col-lg-3 col-sm-4 col-6">
                    <div class="product-wrap">
                        <div class="product-img border border-success">
                            <img src="{{ asset('assets/frontend') }}/images/product/1.jpg" alt="">
                            <div class="product-icon flex-style">
                                <ul>
                                    <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="single-product.html"  class="text-dark">{{ $p->product_name }}</a></h3>
                            <p class="pull-left">{{ $p->price .' '.'Dhm' }}

                            </p>
                            <ul class="pull-right d-flex">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star-half-o"></i></li>
                            </ul>
                        </div>
                    </div>
                </li>
                @empty
                <h3 class="text-center m-5">No Product Found</h3>
                @endforelse
                {{ $product->links() }}
            </ul>
        </div>
    </div>
    <!--best seller product-area end -->
@endsection