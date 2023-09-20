    <!-- featured-area start -->
    <div class="featured-area featured-area2">
        <div class="container">
            <div class="row m-0 p-0">
                <div class="col-12 m-0 p-0">
                    <div class="section-title m-0 p-0">
                        <h5><span class="bg-success text-white pl-4 pr-4">Best Seller</span></h5>
                        {{-- <img src="{{ asset('assets/frontend') }}/images/section-title.png" alt=""> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="featured-active2 owl-carousel next-prev-style mb-0 p-0 mt-4">
                        @forelse ($bestsell as $bsell)
                        <div class="featured-wrap">
                            <div class="featured-img">
                                <img style="height: 200px; width: 255px;" src="{{asset('images/product/'.$bsell->image)}}" alt="">
                                <div class="featured-content">
                                    <a href="{{ route('offerproduct.page') }}">Shop</a>
                                </div>
                            </div>
                            <p  class="text-center"><b><a class="text-dark" href="{{ route('productdetail.page',['id'=>$bsell->id]) }}">{{ $bsell->product_name }}</a></b></p>
                        </div>
                        @empty
                        <h3 class="text-center m-5">No Product Found</h3>
                        @endforelse
                        {{-- <div class="featured-wrap">
                            <div class="featured-img">
                                <img src="{{ asset('assets/frontend') }}/images/featured/7.jpg" alt="">
                                <div class="featured-content">
                                    <a href="shop.html">Mustard Oil</a>
                                </div>
                            </div>
                        </div>
                        <div class="featured-wrap">
                            <div class="featured-img">
                                <img src="{{ asset('assets/frontend') }}/images/featured/8.jpg" alt="">
                                <div class="featured-content">
                                    <a href="shop.html">Olive Oil</a>
                                </div>
                            </div>
                        </div>
                        <div class="featured-wrap">
                            <div class="featured-img">
                                <img src="{{ asset('assets/frontend') }}/images/featured/6.jpg" alt="">
                                <div class="featured-content">
                                    <a href="shop.html">Pure Honey</a>
                                </div>
                            </div>
                        </div>
                        <div class="featured-wrap">
                            <div class="featured-img">
                                <img src="{{ asset('assets/frontend') }}/images/featured/8.jpg" alt="">
                                <div class="featured-content">
                                    <a href="shop.html">Olive Oil</a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- featured-area end -->