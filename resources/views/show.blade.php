@extends('templates.main')

@section('title') {{ $title }} @endsection

@section('content')
<header class="mt-4">
    <h1 class="text-center">{{ $title }}</h1>
</header>

<div class="container-xl d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <img src="{{ $url }}" class="img-fluid imagem">
</div>
@endsection