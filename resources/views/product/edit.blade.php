@extends('layout.app')

@section('pageTitle',trans('Update Product'))
@section('pageSubTitle',trans('Update'))

@section('content')
  <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.product.update',encryptor('encrypt',$product->id))}}">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="uptoken" value="{{encryptor('encrypt',$product->id)}}">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="Category">{{__('Category')}}<span class="text-danger">*</span></label>
                                            <select onchange="show_subcat(this.value)" class="form-control form-select" name="category" id="category">
                                                <option value="">Select Category</option>
                                                @forelse($categories as $cat)
                                                    <option value="{{$cat->id}}" {{ old('category',$product->category_id)==$cat->id?"selected":""}}> {{ $cat->category}}</option>
                                                @empty
                                                    <option value="">No Category found</option>
                                                @endforelse
                                                
                                            </select>
                                           
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="subcategory">{{__('Sub Category')}}</label>
                                            <select onchange="show_childcat(this.value)" class="form-control form-select" name="subcategory" id="subcategory">
                                                <option value="">Select Sub Category</option>
                                                @forelse($subcategories as $sub)
                                                    <option class="subcat subcat{{$sub->category_id}}" value="{{$sub->id}}" {{ old('subcategory',$product->subcategory_id)==$sub->id?"selected":""}}> {{ $sub->name}}</option>
                                                @empty
                                                    <option value="">No Sub Category found</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="childcategory">{{__('Child Category')}}</label>
                                            <select class="form-control form-select" name="childcategory" id="childcategory">
                                                <option value="">Select Child Category</option>
                                                @forelse($childcategories as $child)
                                                    <option class="childcat childcat{{$child->subcategory_id}}" value="{{$child->id}}" {{ old('childcategory',$product->childcategory_id)==$child->id?"selected":""}}> {{ $child->name}}</option>
                                                @empty
                                                    <option value="">No Child Category found</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="unit_id">{{__('Unit')}}</label>
                                            <select class="form-control form-select" name="unit_id" id="unit_id">
                                                <option value="">Select Unit</option>
                                                @forelse($units as $u)
                                                    <option value="{{$u->id}}" {{ old('name',$product->unit_id)==$u->id?"selected":""}}> {{ $u->name}}</option>
                                                @empty
                                                    <option value="">No Unit found</option>
                                                @endforelse
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="show_frontend">{{__('Size')}}</label>
                                        <div class="form-group">
                                            <select class="choices form-select multiple-remove" multiple="multiple" name="size[]">
                                                <optgroup label="Figures">
                                                    <option value="0" selected>Select</option>
                                                    @forelse ($sizes as $size) <!-- Use the $sizes variable from the controller -->
                                                    <option value="{{ $size->id }}" @if(in_array($size->id, $size_edit)) selected @endif>{{ $size->name }}</option>
                                                    @empty
                                                    <option value="">No size Found</option>
                                                    @endforelse
                                                </optgroup>
                                            </select>                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="show_frontend">{{__('Color')}}</label>
                                        <div class="form-group">
                                            <select class="choices form-select multiple-remove" multiple="multiple" name="color[]">
                                                <optgroup label="Figures">
                                                    <option value="0" selected>Select</option>
                                                    @forelse ($colors as $color) <!-- Use the $colors variable from the controller -->
                                                    <option value="{{ $color->id }}" @if(in_array($color->id, $color_edit)) selected @endif>{{ $color->name }}</option>
                                                    @empty
                                                    <option value="">No color Found</option>
                                                    @endforelse
                                                </optgroup>
                                            </select>  
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="brand_id">{{__('Brand')}}</label>
                                            <select class="form-control form-select" name="brand_id" id="brand_id">
                                                <option value="">Select Brand</option>
                                                @forelse($brands as $b)
                                                    <option value="{{$b->id}}" {{ old('name',$product->brand_id)==$b->id?"selected":""}}> {{ $b->name}}</option>
                                                @empty
                                                    <option value="">No Brand found</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="Product Name">{{__('Name')}}<span class="text-danger">*</span></label>
                                            <input type="text" id="productName" class="form-control"
                                                placeholder="Product Name" value="{{ old('productName',$product->product_name)}}" name="productName">
                                              
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="price">{{__('Sell Price')}}<span class="text-danger">*</span></label>
                                            <input type="text" id="price" class="form-control" placeholder="Price" value="{{ old('price',$product->price)}}" name="price">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="purchase_price">{{__('Purchase Price')}}</label>
                                            <input type="text" id="purchase_price" class="form-control"
                                            placeholder="Purchase Price" value="{{ old('purchase_price',$product->purchase_price)}}" name="purchase_price">
                                            @if($errors->has('purchase_price'))
                                                <span class="text-danger"> {{ $errors->first('purchase_price') }}</span>
                                            @endif                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="show_frontend">{{__('Show Frontend')}}</label>
                                        <div class="form-group">
                                            <select class="form-select" name="show_frontend">
                                                <optgroup label="Figures">
                                                    <option value="0">Select</option>
                                                    <option value="1"{{ $product->show_frontend==1?'selected':'' }}>Men's</option>
                                                    <option value="2"{{ $product->show_frontend==2?'selected':'' }}>Wonen's</option>
                                                    <option value="3"{{ $product->show_frontend==3?'selected':'' }}>Kids</option>
                                                    <option value="4"{{ $product->show_frontend==4?'selected':'' }}>Best Seller</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="show_hide">{{__('Show/Hide')}}</label>
                                            <select class="form-control form-select" name="show_hide" id="show_hide">
                                                <option value="1"{{ $product->show_hide==1?'selected':'' }}>Show</option>
                                                <option value="2"{{ $product->show_hide==2?'selected':'' }}>Hide</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="image">{{__('Image')}}</label>
                                            <input type="file" class="form-control dropify" name="image" data-default-file="{{asset('images/product/'.company()['company_id'].'/'.$product->image)}}">
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="description">{{__('Description')}}</label>
                                            <textarea  class="form-control" id="description" rows="8"
                                                placeholder="Product description" name="description">{{ old('description',$product->description)}}</textarea>
                                        </div>
                                    </div>
                                    <div class="row imggl">
                                        <label for="status"><b>{{__('Product Multiple Image')}}:</b></label>
                                        <div class="col-5 col-sm-3 mb-3">
                                            <input type="file" class="dropify" data-height="100" name="product_multiple_image[]"/>
                                        </div> 
                                        <div class="col-2 addbtn">
                                            <button type="button" class="btn btn-primary" onclick="addGallery()">Add More</button>
                                        </div> 
                                    </div> <!-- end row -->
                                    <div class="row imggl">
                                        @forelse($multi_photo as $mp)
                                        <div class="col-5 col-sm-3 mb-3 text-center del{{$mp->id}}">
                                            <img class="modImg w-100" src="{{asset('images/product/'.company()['company_id'].'/'.$mp->product_multiple_image)}}" alt="" />
                                            <button type="button" onclick="deletedata({{$mp->id}})" class="btn btn-danger btn-sm mt-2">Delete</button>
                                        </div>
                                        @empty
    
                                        @endforelse
                                        
                                    </div>
                                    
                                    <div class="col-12 d-flex justify-content-end">
                                    {{-- <img width="80px" height="40px" class="float-first" src="{{asset('images/product/'.company()['company_id'].'/'.$product->image)}}" alt=""> --}}
                                        <button type="submit" class="btn btn-primary me-1 mb-1">{{__('Save')}}</button>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    /* call on load page */
    $(document).ready(function(){
        $('.subcat').hide();
        $('.childcat').hide();
    })

    function show_subcat(e){
         $('.subcat').hide();
         $('.subcat'+e).show()
    }
    function show_childcat(e){
        $('.childcat').hide();
        $('.childcat'+e).show();
    }    
</script>
<script>
    function addGallery(){
        $('.addbtn').before('<div class="col-5 col-sm-3 mb-3"><input type="file" class="dropify" data-height="100" name="product_multiple_image[]"/></div> ');
        $(".dropify").dropify({messages:{default:"Drag and drop a file here or click",replace:"Drag and drop or click to replace",remove:"Remove",error:"Ooops, something wrong appended."},error:{fileSize:"The file size is too big (1M max)."}});
    }

    function deletedata(e){
        $.get("{{route(currentUser().'.multiple_img')}}?id="+e, function(data, status){
            alert("Image Deleted!");
            $('.del'+e).remove();
        });
    }
</script>
@endpush