@extends('Frontend.layouts.app')

@section('title', 'TG ENC - {{ $pageTitle }} | Precision Granite Stage Technology')

@section('content')
    @include('Frontend.sections.hero')
    @include('Frontend.sections.product-category-content')
@endsection
