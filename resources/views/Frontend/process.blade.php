@extends('Frontend.layouts.app')

@section('title', 'TG ENC - {{ $pageTitle }} | Precision Granite Stage Technology')

@section('content')
    @include('Frontend.sections.products-hero')
    @include('Frontend.sections.process-content')
@endsection
