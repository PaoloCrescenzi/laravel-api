@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="d-flex justify-content-between">
                        <h5>Pojects</h5>
                        <a href="{{route('admin.projects.index')}}" class="btn btn-primary">GO</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
