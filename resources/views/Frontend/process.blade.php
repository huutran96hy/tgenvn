@extends('Frontendlayouts.app')

@section('title', 'TG ENC - {{ $pageTitle }} | Precision Granite Stage Technology')

@section('content')
    @include('Frontendsections.products-hero')
    @include('Frontendsections.process-content')
@endsection
