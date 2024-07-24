@extends('app')
@section("title","URL Shortner")
@section("content")
<div class="row">
    <div class="col-auto">
        <a href="{{ Route('create') }}" class="btn btn-primary">Shorten URL</a>
    </div>
    <div class="col-auto">
        <a href="{{ Route('fetch') }}" class="btn btn-success">Fetch Original URL</a>
    </div>
</div>
@endsection