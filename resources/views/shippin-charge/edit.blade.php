@extends('layout.app')

@section('pageTitle',trans('Update shippingcharge'))
@section('pageSubTitle',trans('Update'))

@section('content')
<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="post" action="{{route(currentUser().'.shippingcharge.update',encryptor('encrypt',$shippingcharge->id))}}">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="uptoken" value="{{encryptor('encrypt',$shippingcharge->id)}}">
                            <div class="row">
                                
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="name">{{__('Name')}}</label>
                                        <input type="text" id="name" class="form-control"
                                            placeholder="shippingcharge Name" value="{{ old('name',$shippingcharge->location)}}" name="name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="charge">{{__('Shipping Charge')}}</label>
                                        <input type="text" id="charge" class="form-control"
                                            placeholder="charge" value="{{ old('charge',$shippingcharge->charge)}}" name="charge">
                                    </div>
                                    @if($errors->has('charge'))
                                    <span class="text-danger"> {{ $errors->first('charge') }}</span>
                                    @endif
                                </div>

                                <div class="col-12 d-flex justify-content-start">
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