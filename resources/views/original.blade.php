@extends('app')
@section("title","Success")
@section("content")
<div class="row">
    <div class="col-md-11">
        <p>Your provided short link was redirecting to: 
            @if (isset($originalUrl))
            <a href="{{ $originalUrl }}">{{$originalUrl}}</a>
            @endif
        </p>
    </div>
</div>
<div class="row">
    <div class="col-auto">
        <a href="{{ Route('fetch') }}" class="btn btn-primary">Find another Link</a>
    </div>
    <div class="col-auto">
        <a href="{{ Route('home') }}" class="btn btn-outline-light">Go to Home</a>
    </div>
</div>
@endsection