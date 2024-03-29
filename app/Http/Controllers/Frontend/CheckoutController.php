<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Online_order\ShippingCharge;

class CheckoutController extends Controller
{
    public function checkoutPage()
    {
        $carts=Cart::content();
        $total_price=Cart::subtotal();
        $shipping=ShippingCharge::select('id','location','charge')->get();
        return view('frontend.pages.checkout',compact('carts','total_price','shipping'));
    }

    public function ShippingAjax($shipping_id)
    {
          $total_price=str_replace(",", "", Cart::subtotal());
        // $shipcheck=Shippingcharge::where('district_id',$district_id);
        $shippingcharge=Shippingcharge::where('id',$shipping_id);
        if($shippingcharge->count() >0 && $total_price<=10000)
            $shippingcharge= $shippingcharge->pluck('charge')[0];
        else
            $shippingcharge=0;

        if (Session::has('coupon')){
            $return="
            <tr>
                <td>Subtotal</td>
                <td> ".Cart::subtotal()." Dhm</td>
            </tr>
            <tr>
                <td>Discount</td>
                <td> (-) ". Session::get('coupon')['discount'] ." Dhm</td>
            </tr>
            <tr>
                <td>Shipping</td>
                <td id='shipping_charge'>"."(+) ".$shippingcharge." Dhm</td>
            </tr>
            <tr>
                <td>Total</td>
                <td> ". (Session::get('coupon')['balance'])+$shippingcharge ." TK<del class='text-danger'> ৳". (Session::get('coupon')['cart_total']+$shippingcharge) ." TK</del></td>
            </tr>
            <tr>
            <td>
                <input id='delivery' name='payment_method' value='1' type='checkbox'>
                <label for='delivery'>Cash on Delivery</label>
            </td>
        </tr>";
        }else{
            $return="<tr>
                        <td>Subtotal</td>
                        <td> ".Cart::subtotal()." Dhm</td>
                    </tr>
                    <tr>
                        <td>Shipping</td>
                        <td id='shipping_charge'>"."(+) ".$shippingcharge." Dhm</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td> ".(str_replace(",", "", Cart::subtotal())+$shippingcharge)." Dhm</td>
                    </tr>
                    <tr>
                    <td>
                        <input id='' type='checkbox'>
                        <label for=''>Direct Bank Transfer</label>
                    </td>
                </tr>
                    <tr>
                    <td>
                        <input id='delivery' name='payment_method' value='COD' type='checkbox'>
                        <label for='delivery'>Cash on Delivery</label>
                    </td>
                </tr>";
        }

        session_start();
        unset($_SESSION['s_charge']);
        $_SESSION['s_charge']=$shippingcharge;
        return response()->json($return,200);
    }

    public function placeOrder(Request $request)
    {
        session_start();
        $shippingcharge= isset($_SESSION['s_charge'])?$_SESSION['s_charge']:0;
        if(Session::get('coupon'))
            $cuponbalance=Session::get('coupon')['balance'];
        else
            $cuponbalance=str_replace(",", "", Cart::subtotal());

        // die();
        // dd($request->all());
        // DB::beginTransaction();
        // try {
        //     $billing = new Billing;
        //     $billing->name=$request->full_name;
        //     $billing->email=$request->email;
        //     $billing->phone_number=$request->contact;
        //     $billing->district_id=$request->district_id;
        //     $billing->upazila_id=$request->upazila_id;
        //     $billing->address=$request->shipping_address;
        //     $billing->order_notes=$request->order_note;
        //     $billing->payment_method=$request->payment_method;
        //     if($billing->save()){
        //         $order=new Order;
        //         $order->user_id=$request->session()->get('userId');
        //         $order->billing_id=$billing->id;
        //         $order->invoice_no="AB_".str_pad($billing->id,8,"0",STR_PAD_LEFT);
        //         $order->sub_total=Session::get('coupon')['cart_total']??str_replace(",", "", Cart::subtotal());
        //         $order->discount_amount=Session::get('coupon')['discount']?? 0;
        //         $order->cupon_code=Session::get('coupon')['cupon_code']?? '';
        //         $order->shipping_charge=$shippingcharge?? 0;
        //         $order->total=$cuponbalance+$shippingcharge??str_replace(",", "", Cart::subtotal())+$shippingcharge;
        //         $order->status=0;
        //         if($order->save()){

        //             //Order details table data insert using cart_items helpers
        //             foreach(Cart::content() as $cart_item) {
        //                 $orderdetails= new OrderDetails;
        //                 $orderdetails->order_id=$order->id;
        //                 $orderdetails->user_id=$request->session()->get('userId');
        //                 $orderdetails->product_id=$cart_item->id;
        //                 $orderdetails->product_qty=$cart_item->qty;
        //                 $orderdetails->product_price=$cart_item->price;
        //                 // StockEntry::findOrFail($cart_item->id)->decrement('qty', $cart_item->qty);
        //                 // DB::table('db_stockentry')->findOrFail($cart_item->id)->decrement('qty', $cart_item->qty);
        //                 if($orderdetails->save()){
        //                     Cart::destroy();
        //                     Session::forget('coupon');
        //                     Session::forget('shipping');

        //                     // Toastr::success('Your Order placed successfully!!!!','Success');
        //                     return view('product.order-complete-message');
        //                 }else{
        //                     return back();
        //                 }
        //             }
        //             Cart::destroy();
        //             Session::forget('coupon');
        //             Session::forget('shipping');
        //             return redirect()->route('home');
        //             // DB::commit();
        //         }else{
        //             return back();
        //         }
        //         return back();
        //     }else{
        //     return redirect()->back()->with('please try again');
        //     }

        // }catch(Exception $e){
        //     // DB::rollback();
        //     dd($e);
        // }
    }
}
