@extends('index')
@section('content')

<style>
    .intro_image_about img {
        width: 100%;
    }
</style>

<!-- Intro -->
<div class="intro">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="intro_image_about"><img src="{{ asset('uploads/'.$company->featured_img) }}" alt="{{ $company->name }}"></div>
            </div>
            <div class="col-lg-6">
                <div class="intro_content" style="text-align:justify;">
                    <div class="intro_title">{{ $company->name }}</div>
                    <p class="intro_text">
                        {!! $company->description !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection