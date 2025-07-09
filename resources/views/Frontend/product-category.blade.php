@extends('frontend.layouts.app')

@section('title', 'TG ENC - {{ $pageTitle }} | Precision Granite Stage Technology')

@section('content')
    @include('frontend.sections.products-hero')
    @include('frontend.sections.product-category-content')
@endsection
