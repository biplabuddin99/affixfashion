<?php

namespace App\Http\Controllers\Online_order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Online_order\ShippingCharge;
use App\Http\Traits\ResponseTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class ShippingChargeController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shippingcharge=ShippingCharge::all();
        return view('shippin-charge.index',compact('shippingcharge'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('shippin-charge.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $b= new ShippingCharge;
            $b->location=$request->name;
            $b->charge=$request->charge;
            $b->company_id=company()['company_id'];
            $b->status=1;
            if($b->save()){
               Toastr::success('successfully Create done!');
                return redirect()->route('shippingcharge.index')->with($this->resMessageHtml(true,null,'Successfully created'));
            }else{
                return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
            }
        }catch(Exception $e){
            dd($e);
            return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shippingcharge=ShippingCharge::findOrFail(encryptor('decrypt',$id));
        return view('shippin-charge.edit',compact('shippingcharge'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $b= ShippingCharge::findOrFail(encryptor('decrypt',$id));
            $b->location=$request->name;
            $b->charge=$request->charge;
            $b->company_id=company()['company_id'];
            $b->status=1;
            if($b->save())
                return redirect()->route('shippingcharge.index')->with($this->resMessageHtml(true,null,'Successfully Updated'));
            else
                return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }catch(Exception $e){
            //dd($e);
            return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shipping= ShippingCharge::findOrFail(encryptor('decrypt',$id));
        $shipping->delete();
        return redirect()->back();
    }
}
