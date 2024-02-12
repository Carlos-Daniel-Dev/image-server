@extends('templates.main')

@section('title') {{ $title }} @endsection

@section('content')

<div class="container-xl d-flex justify-content-center align-items-center vh-100">
    <div class="col-6 text-center">
        <img src="{{ $url }}">
    </div>
</div>
@endsection