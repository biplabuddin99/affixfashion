    <!-- header-area start -->
    <header class="header-area" style="position: sticky; top:0px; z-index:100;">
        <div class="header-top bg-2">
            <div class="fluid-container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-2">
                        <div class="logo m-0 p-0">
                            <a href="{{ route('home') }}">
                        <img style="max-height: 80px;" src="{{ asset('assets/frontend') }}/images/logo01.png" alt="">
                        </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-3 mt-3">
                        <div class="row">
                            <div class="col-10"><input type="text" class="form-control border border-success" placeholder="What are You looking for?"></div>
                            <div class="col-2 btn btn-success"><i class="fa fa-search" aria-hidden="true"></i></div>
                        </div>
                        
                        {{-- <a href="javascript:void(0);"><i class="flaticon-search"></i></a> --}}
                    </div>
                    <div class="col-lg-5 col-md-4 col-sm-3">
                        <ul class="d-flex account_login-area">
                            @auth
                            <li>
                                <a href="javascript:void(0);"><i class="fa fa-user"></i> My Account <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown_style">
                                    <li><a href="#">Cart</a></li>
                                    {{-- <li><a href="checkout.html">Checkout</a></li> --}}
                                    <li><a href="wishlist.html">wishlist</a></li>
                                    <li><a href="#">Logout</a></li>
                                </ul>
                            </li>
                            @endauth
                            @guest
                            <li><a style="color:white !important;" class="btn btn-warning" href="{{ route('front.login') }}">Login</a></li>
                            <li><a style="color:white !important;" class="btn btn-primary" href="{{ route('front.register') }}"> Signup </a></li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="fluid-container">
                <div class="row">
                    <div class="col-lg-7 col-md-4 col-sm-4 col-4 d-none d-lg-block">
                        <nav class="mainmenu">
                            <ul class="d-flex">
                                <li class=""><a href="{{ route('home') }}">Home</a></li>
                                <li>
                                    <a href="javascript:void(0);">Categories <i class="fa fa-angle-down"></i></a>
                                    @php
                                    $category =\App\Models\Products\Category::all();
                                    @endphp
                                    <ul class="dropdown_style">
                                        @forelse($category as $cat)
                                        <li class="sub_list"><a href="javascript:void(0);">{{ $cat->category }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-angle-right"></i></a>
                                            @if($cat->sub_category->count()>0)
                                            <ul class="sub_menu dropdown_style">
                                                @foreach ($cat->sub_category as $subcat)
                                                <li class="sub_list"><a href="#">{{ $subcat->name }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-angle-right"></i></a>
                                                    @if($subcat->child_category->count()>0)
                                                    <ul class="sub_menu">
                                                        @foreach ($subcat->child_category as $chcat)
                                                        <li><a href="{{ route('category.product.list',[$cat->id,$subcat->id,$chcat->id]) }}">{{ $chcat->name }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                    @endif
                                                </li>
                                                @endforeach
                                            </ul>
                                            @endif
                                        </li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </li>
                                <li><a href="#">About</a></li>
                                <li>
                                    <a href="javascript:void(0);">Shop <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_style">
                                        <li><a href="#">Shop Page</a></li>
                                        <li><a href="#">Shopping cart</a></li>
                                        {{-- <li><a href="checkout.html">Checkout</a></li> --}}
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                    </ul>
                                </li>
                                {{-- <li>
                                    <a href="javascript:void(0);">Pages <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_style">
                                        <li><a href="about.html">About Page</a></li>
                                        <li><a href="single-product.html">Product Details</a></li>
                                        <li><a href="{{ route('cart.page') }}">Shopping cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="faq.html">FAQ</a></li>
                                    </ul>
                                </li> --}}
                                <li>
                                    <a href="javascript:void(0);">Blog <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_style">
                                        <li class="sub_list"><a href="javascript:void(0);">blog Page &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-angle-right"></i></a>
                                            <ul class="sub_menu dropdown_style">
                                                <li class="sub_list"><a href="#">Blogsub1 Page</a>
                                                    <ul class="sub_menu">
                                                        <li><a href="#">BlogChild Page</a></li>
                                                        <li><a href="#">BlogChild cart</a></li>
                                                        {{-- <li><a href="checkout.html">Checkout</a></li> --}}
                                                        <li><a href="wishlist.html">Wishlist</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Blogsub cart</a></li>
                                                {{-- <li><a href="checkout.html">Checkout</a></li> --}}
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="blog-details.html">blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-4 col-lg-2 col-sm-5 col-4">
                        <ul class="search-cart-wrapper d-flex">
                            {{-- <li class="search-tigger"><a href="javascript:void(0);"><i class="flaticon-search"></i></a></li> --}}
                            <li>
                                <a href="javascript:void(0);"><i class="flaticon-like"></i> <span>2</span></a>
                                <ul class="cart-wrap dropdown_style">
                                    <li class="cart-items">
                                        <div class="cart-img">
                                            <img src="{{ asset('assets/frontend') }}/images/cart/1.jpg" alt="">
                                        </div>
                                        <div class="cart-content">
                                            <a href="#">Pure Nature Product</a>
                                            <span>QTY : 1</span>
                                            <p>$35.00</p>
                                            <i class="fa fa-times"></i>
                                        </div>
                                    </li>
                                    <li class="cart-items">
                                        <div class="cart-img">
                                            <img src="{{ asset('assets/frontend') }}/images/cart/3.jpg" alt="">
                                        </div>
                                        <div class="cart-content">
                                            <a href="#">Pure Nature Product</a>
                                            <span>QTY : 1</span>
                                            <p>$35.00</p>
                                            <i class="fa fa-times"></i>
                                        </div>
                                    </li>
                                    <li>Subtotol: <span class="pull-right">$70.00</span></li>
                                    <li>
                                        <a href="#"><button>Check Out</button></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><i class="flaticon-shop"></i> <span>{{ \Gloudemans\Shoppingcart\Facades\Cart::content()->count() }}</span></a>
                                <ul class="cart-wrap dropdown_style">
                                    @php
                                        $carts=\Gloudemans\Shoppingcart\Facades\Cart::content();
                                        $total_price=\Gloudemans\Shoppingcart\Facades\Cart::subtotal();
                                    @endphp
                                    @foreach ($carts as $item)
                                    <li class="cart-items">
                                        <div class="cart-img">
                                            <img src="{{ asset('images/product') }}/{{ $item->options->product_image }}" alt="" class="img-fluid rounded" style="width: 60px;">
                                        </div>
                                        <div class="cart-content">
                                            <a href="{{ route('cart.page') }}">{{ $item->name }}</a>
                                            <span>QTY : {{ $item->qty }}</span>
                                            <p>{{ $item->qty * $item->price }} Dhm</p>
                                            <a href="{{ route('removefrom.cart',['cart_id'=>$item->rowId]) }}">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </li>
                                    @endforeach
                                    <li>Subtotol: <span class="pull-right">{{ $total_price }} Dhm</span></li>
                                    <li>
                                        <a href="{{ route('cart.page') }}"><button>View All</button></a>
                                    </li>
                                </ul>
                                {{-- <a href="javascript:void(0);"><i class="flaticon-shop"></i> <span>{{ \Gloudemans\Shoppingcart\Facades\Cart::content()->count() }}</span></a>
                                <ul class="cart-wrap dropdown_style">
                                    @php
                                        $carts=\Gloudemans\Shoppingcart\Facades\Cart::content();
                                        $total_price=\Gloudemans\Shoppingcart\Facades\Cart::subtotal();
                                    @endphp
                                    @foreach ($carts as $item)
                                    <li class="cart-items">
                                        <div class="cart-img">
                                            <img src="{{ asset('uploads/product_photos') }}/{{ $item->options->product_image }}" alt="" class="img-fluid rounded" style="width: 60px;">
                                        </div>
                                        <div class="cart-content">
                                            <a href="{{ route('cart.page') }}">{{ $item->name }}</a>
                                            <span>QTY : {{ $item->qty }}</span>
                                            <p>${{ $item->qty * $item->price }}</p>
                                            <a href="{{ route('removefrom.cart',['cart_id'=>$item->rowId]) }}">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </li>
                                    @endforeach
                                    <li>Subtotol: <span class="pull-right">${{ $total_price }}</span></li>
                                    <li>
                                        <a href="{{ route('customer.checkoutpage') }}"><button>Check Out</button></a>
                                    </li>
                                </ul> --}}
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-1 col-sm-1 col-2 d-block d-lg-none">
                        <div class="responsive-menu-tigger">
                            <a href="javascript:void(0);">
                        <span class="first"></span>
                        <span class="second"></span>
                        <span class="third"></span>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- responsive-menu area start -->
            <div class="responsive-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-block d-lg-none">
                            <ul class="metismenu">
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li class="sidemenu-items">
                                    <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Shop </a>
                                    <ul aria-expanded="false">
                                        <li><a href="#">Shop Page</a></li>
                                        <li><a href="single-product.html">Product Details</a></li>
                                        <li><a href="#">Shopping cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                    </ul>
                                </li>
                                <li class="sidemenu-items">
                                    <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Pages </a>
                                    <ul aria-expanded="false">
                                      <li><a href="about.html">About Page</a></li>
                                      <li><a href="#">Shopping cart</a></li>
                                      <li><a href="checkout.html">Checkout</a></li>
                                      <li><a href="wishlist.html">Wishlist</a></li>
                                      <li><a href="faq.html">FAQ</a></li>
                                    </ul>
                                </li>
                                <li class="sidemenu-items">
                                    <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Blog</a>
                                    <ul aria-expanded="false">
                                        <li><a class="has-arrow" href="blog.html">Blog1</a>
                                            <ul aria-expanded="false">
                                                <li><a class="has-arrow" href="#">Blogsub1 Page</a>
                                                    <ul aria-expanded="false">
                                                        <li><a class="has-arrow" href="#">BlogChild Page</a></li>
                                                        <li><a class="has-arrow" href="#">BlogChild cart</a></li>
                                                        {{-- <li><a href="checkout.html">Checkout</a></li> --}}
                                                        <li><a href="wishlist.html">Wishlist</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Blogsub cart</a></li>
                                                {{-- <li><a href="checkout.html">Checkout</a></li> --}}
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- responsive-menu area start -->
        </div>
    </header>
    <!-- header-area end -->
