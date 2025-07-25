@extends('Frontend.layouts.app')

@section('title', 'TG ENC - 공지사항 | Precision Granite Stage Technology')

@section('content')
    @include('Frontend.sections.hero')
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:grid lg:grid-cols-4 gap-6">
            @include('Frontend.components.support-sidebar', ['activePage' => 'notices'])
            <div class="lg:col-span-3">
                @include('Frontend.components.notices-main')
            </div>
        </div>
    </div>
@endsection
