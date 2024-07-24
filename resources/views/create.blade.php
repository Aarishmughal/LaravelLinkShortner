@extends('app')
@section("title","Shorten Your URLs")
@section("content")
<form action={{ Route('store') }} method="POST">
    @csrf
    <div class="row mb-3">
        <div class="col-md-9">
            <label for="url" class="form-text">Enter Your URL Here</label>
            <input type="text" class="form-control" name="url" id="url">
        </div>
        <div class="col"></div>
    </div>
    <div class="row">
        <div class="col-auto">
            <button class="btn btn-primary px-3" type="submit">Shorten URL</button>
        </div>
        <div class="col-auto">
            <a href="{{Route("home")}}" class="btn btn-outline-light">Back</a>
        </div>
    </div>
</form>
@endsection