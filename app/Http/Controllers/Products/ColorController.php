<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;

use App\Models\Products\Color;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class ColorController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $color = Color::where(company())->paginate(10);
        return view('color.index',compact('color'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('color.create');
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
            $b= new Color;
            $b->name=$request->name;
            $b->company_id=company()['company_id'];
            if($b->save()){
               Toastr::success('successfully color Create done!');
                return redirect()->route('color.index')->with($this->resMessageHtml(true,null,'Successfully created'));
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
     * @param  \App\Models\Products\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $color=Color::findOrFail(encryptor('decrypt',$id));
        return view('color.edit',compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        try{
            $b= Color::findOrFail(encryptor('decrypt',$id));
            $b->name=$request->name;
            if($b->save())
                return redirect()->route('color.index')->with($this->resMessageHtml(true,null,'Successfully Updated'));
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
     * @param  \App\Models\Products\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $color= Color::findOrFail(encryptor('decrypt',$id));
        $color->delete();
        return redirect()->back();
    }
}
