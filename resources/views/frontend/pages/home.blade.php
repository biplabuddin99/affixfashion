@extends('frontend.layout.master')
@section('frontendtitle')
Home
@endsection
@section('frontend_contend')
@include('frontend.pages.widgets.slider')
@include('frontend.pages.widgets.features')
@include('frontend.pages.widgets.countdown')
@include('frontend.pages.widgets.bestseller')
@include('frontend.pages.widgets.latestproduct')
@include('frontend.pages.widgets.testimonial')
@endsection
