@extends('app')
@section("title","Success")
@section("content")
<div class="row">
    <div class="col-md-9">
        <p>Your provided link has been shortened to: 
            @if (isset($shortUrl))
            <a href="{{ $shortUrl }}">{{$shortUrl}}</a>
            @endif
        </p>
    </div>
</div>
<div class="row">
    <div class="col-auto">
        <a href="{{ Route('create') }}" class="btn btn-primary">Shorten another Link</a>
    </div>
    <div class="col-auto">
        <a href="{{ Route('home') }}" class="btn btn-outline-light">Go to Home</a>
    </div>
</div>
@endsection