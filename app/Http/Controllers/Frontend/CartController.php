<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class CartController extends Controller
{
    public function cartPage()
    {
        $carts=Cart::content();
        $total_price=Cart::subtotal();
        // return $carts;
        if($total_price>0){
            return view('frontend.pages.shopping-cart',compact('carts','total_price'));
        }else{
            return view('frontend.pages.empty_cart');
        }
    }

    public function addToCart(Request $request)
    {
        // dd($request->all());
        $product_id=$request->product_id;
        $order_qty=$request->order_qty;

        $product=Product::where('id',$product_id)->first();
        // return $product;

        Cart::add([
            'id' =>$product->id,
            'name' =>$product->product_name,
            'price'=>$product->price,
            'weight'=>0,
            // 'product_stock'=>$product->product_stock,
            'qty'=>$order_qty,
            'options'=>[
                'product_image'=>$product->image
            ]
        ]);

        Toastr::success('Product Added in to Cart!!');
        return back();

    }
    public function removeFromCart($cart_id)
    {
        Cart::remove($cart_id);
        Toastr::info('Product Remove from Cart!!');
        return back();
    }
}
