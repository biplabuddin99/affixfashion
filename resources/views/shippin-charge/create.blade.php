@extends('layout.app')

@section('pageTitle',trans('Create Shipping Charge'))
@section('pageSubTitle',trans('Create'))

@section('content')
<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="post" action="{{route('shippingcharge.store')}}">
                            @csrf
                            <div class="row">                               
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="name">{{__('Location')}}</label>
                                        <input type="text" id="name" class="form-control"
                                            placeholder="Location Name" value="{{ old('name')}}" name="name">
                                    </div>
                                    @if($errors->has('name'))
                                    <span class="text-danger"> {{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="charge">{{__('Shipping Charge')}}</label>
                                        <input type="text" id="charge" class="form-control"
                                            placeholder="charge" value="{{ old('charge')}}" name="charge">
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