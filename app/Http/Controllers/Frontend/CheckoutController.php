<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Online_order\ShippingCharge;

class CheckoutController extends Controller
{
    public function checkoutPage()
    {
        $carts=Cart::content();
        $total_price=Cart::subtotal();
        $districts=ShippingCharge::select('id','name','bn_name')->get();
        return view('frontend.pages.checkout',compact('carts','total_price','districts'));
    }
}
