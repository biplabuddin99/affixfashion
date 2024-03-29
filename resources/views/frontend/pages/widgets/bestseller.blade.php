    <!--best seller product-area start -->
    <div class="product-area product-area-2">
        <div class="fluid-container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title m-0 p-0">
                        <h4><span class="bg-success text-white pl-4 pr-4">Our Latest Product</span></h4>
                        {{-- <img src="{{ asset('assets/frontend') }}/images/section-title.png" alt=""> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 pull-left">
                    <div class="m-0 p-0">
                        <h4><span class="border border-success pl-5 pr-5">Men</span></h4>
                        {{-- <img src="{{ asset('assets/frontend') }}/images/section-title.png" alt=""> --}}
                    </div>
                </div>
                <div class="col-6 pull-right text-right"><a class="text-success" href="">Men All</a></div>
            </div>
            <ul class="row">
                @forelse($products as $p)
                <li class="col-xl-2 col-lg-3 col-sm-4 col-6">
                    <div class="product-wrap">
                        <div class="product-img border border-success">
                            <img src="{{asset('images/product/'.$p->image)}}" alt="">
                            <div class="product-icon flex-style">
                                <ul>
                                    <li><a data-toggle="modal" data-target="#exampleModalCenter{{ $p->id }}" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>

                                    <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="{{ route('productdetail.page',['id'=>$p->id]) }}"  class="text-dark">{{ $p->product_name }}</a></h3>
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
                <!-- Modal area start -->
                <div class="modal fade" id="exampleModalCenter{{ $p->id }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="modal-body d-flex">
                                <div class="product-single-img w-50">
                                    <img src="{{asset('images/product/'.$p->image)}}" alt="">
                                </div>
                                <div class="product-single-content w-50">
                                    <h3>{{ $p->product_name }}</h3>
                                    <div class="rating-wrap fix">
                                        <span class="pull-left">{{ $p->price }}Dhm</span>
                                        {{-- <ul class="rating pull-right">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li>(05 Customar Review)</li>
                                        </ul> --}}
                                    </div>
                                    <p class="pb-1 mb-0">{{ $p->description }}</p>
                                    <p class="pb-1 mb-0"><b class="text-primary">Avabile Size:</b>
                                        @php
                                            $sizes = \App\Models\Products\Size::whereIn('id',explode(',',$p->size))->get();
                                        @endphp
                                        @foreach($sizes as $size)
                                        <input type="checkbox" id="size_{{ $size->id }}" name="sizes[]" value="{{ $size->id }}">
                                        <label class="font-weight-bold mr-2" for="size_{{ $size->id }}">{{ $size->name }}</label>
                                        @endforeach
                                    </p>
                                    <p><b class="text-primary">Avabile Color:</b>
                                        @php
                                        $colors = \App\Models\Products\Color::whereIn('id',explode(',',$p->color))->get();
                                        @endphp
                                        @foreach($colors as $color)
                                        <input type="checkbox" id="color_{{ $color->id }}" name="colors[]" value="{{ $color->id }}">
                                        <label class="font-weight-bold mr-2" for="color_{{ $color->id }}">{{ $color->name }}</label>
                                        @endforeach                                            
                                    </p>
                                    <ul class="input-style">
                                        {{-- <form action="">
                                            <li class="quantity cart-plus-minus">
                
                                                <input class="cartqty" type="text" value="1" />
                                            </li>
                                            <li><a href="cart.html">Add to Cart</a></li>
                                        </form> --}}
                                        <form action="{{ route('add-to.cart') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $p->id }}">
                                            <li class="quantity cart-plus-minus">
                                                <input type="text" value="1" name="order_qty" />
                                            </li>
                                            <li>
                                                <button style="position: absolute; right: -170px; top: -25px; width: 170px; height: 42px;" type="submit" class="btn btn-danger">Add to Cart</button>
                                            </li>
                                        </form>
                                    </ul>
                                    <ul class="cetagory">
                                        <li>Categories:</li>
                                        <li><a class="text-dark" href="#">Honey,</a></li>
                                        <li><a class="text-dark" href="#">Olive Oil</a></li>
                                    </ul>
                                    <ul class="socil-icon">
                                        <li>Share :</li>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal area start -->
                @empty
                <h3 class="text-center m-5">No Product Found</h3>
                @endforelse
            </ul>
            <div class="row">
                <div class="col-6">
                    <div class="m-0 p-0">
                        <h4><span class="border border-success pl-5 pr-5">Women</span></h4>
                        {{-- <img src="{{ asset('assets/frontend') }}/images/section-title.png" alt=""> --}}
                    </div>
                </div>
                <div class="col-6 pull-right text-right"><a class="text-success" href="">Women All</a></div>
            </div>
            <ul class="row">
                @forelse($womens as $p)
                <li class="col-xl-2 col-lg-3 col-sm-4 col-6">
                    <div class="product-wrap">
                        <div class="product-img border border-success">
                            <img src="{{asset('images/product/'.$p->image)}}" alt="">
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
            </ul>
            <div class="row">
                <div class="col-6">
                    <div class="m-0 p-0">
                        <h4><span class="border border-success pl-5 pr-5">Kids</span></h4>
                        {{-- <img src="{{ asset('assets/frontend') }}/images/section-title.png" alt=""> --}}
                    </div>
                </div>
                <div class="col-6 pull-right text-right"><a class="text-success" href="">Kids All</a></div>
            </div>
            <ul class="row">
                @forelse($kids as $p)
                <li class="col-xl-2 col-lg-3 col-sm-4 col-6">
                    <div class="product-wrap">
                        <div class="product-img border border-success">
                            <img src="{{asset('images/product/'.$p->image)}}" alt="">
                            <div class="product-icon flex-style">
                                <ul>
                                    <li><a data-toggle="modal" data-target="#exampleModalCenter{{ $p->id }}" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
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
            </ul>
            <div class="row">
                <div class="col-6">
                    <div class="m-0 p-0">
                        <h4><span class="border border-success pl-5 pr-5">Accessories</span></h4>
                        {{-- <img src="{{ asset('assets/frontend') }}/images/section-title.png" alt=""> --}}
                    </div>
                </div>
                <div class="col-6 pull-right text-right"><a class="text-success" href="">Accessories All</a></div>
            </div>
            <ul class="row">
                @forelse($accessories as $p)
                <li class="col-xl-2 col-lg-3 col-sm-4 col-6">
                    <div class="product-wrap">
                        <div class="product-img border border-success">
                            <img src="{{asset('images/product/'.$p->image)}}" alt="">
                            <div class="product-icon flex-style">
                                <ul>
                                    <li><a data-toggle="modal" data-target="#exampleModalCenter{{ $p->id }}" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
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
            </ul>
        </div>
    </div>
    <!--best seller product-area end -->
    {{-- @push('frontend_script')
    <script>
     
    </script>
    @endpush --}}