@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 mb-4 bg-light rounded-3">
    <div class="container py-5">
        <div class="logo_laravel">
            <img src="{{asset('logo/logoPC.png')}}" alt="" style="width: 60px" >
        </div>
        <h1 class="display-5 fw-bold">
            Welcome to my site
        </h1>

        <p class="col-md-8 fs-4">Benvenuto nel mio sito-portfolio, qui vedrai tutti i miei progetti fatti nel corso boolean</p>
        <a href="{{route('admin.projects.index')}}"><button class="btn btn-primary btn-lg" type="button">Vai ai progetti</button></a>
    </div>
</div>

<div class="content">
    <div class="container">
        <p>Footer</p>
    </div>
</div>
@endsection
