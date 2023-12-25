<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;

use App\Models\Products\Size;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class SizeController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $size = Size::where(company())->paginate(10);
        return view('size.index',compact('size'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('size.create');
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
            $b= new Size;
            $b->name=$request->name;
            $b->company_id=company()['company_id'];
            if($b->save()){
               Toastr::success('successfully Size Create done!');
                return redirect()->route('size.index')->with($this->resMessageHtml(true,null,'Successfully created'));
            }else{
                return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
            }
        }catch(Exception $e){
            //dd($e);
            return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $size=Size::findOrFail(encryptor('decrypt',$id));
        return view('size.edit',compact('size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        try{
            $b= Size::findOrFail(encryptor('decrypt',$id));
            $b->name=$request->name;
            if($b->save())
                return redirect()->route('size.index')->with($this->resMessageHtml(true,null,'Successfully created'));
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
     * @param  \App\Models\Products\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $size= Size::findOrFail(encryptor('decrypt',$id));
        $size->delete();
        return redirect()->back();
    }
}
