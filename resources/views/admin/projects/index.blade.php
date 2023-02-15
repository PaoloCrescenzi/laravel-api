@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Tutti i progetti</h1>
        <div>
            <a href="{{route('admin.projects.create')}}"><button class="btn btn-primary"><i class="fa-solid fa-plus"></i></button></a>
            <a href="/"><button class="btn btn-primary"><i class="fa-solid fa-house"></i></button></a>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach ($projects as $project)
        <div class="col">
            <div class="card d-flex">
                <img class="mr-3 img-thumbnail rounded" src="{{ asset('/storage/' . $project->cover_img)}}" alt="Generic placeholder image">
                <div class="card-body">
                    <h5 class="card-title">{{$project->name}}</h5>
                    <p class="card-text">{{$project->description}}</p>
                    <div class="d-flex">
                        <a href="{{route('admin.projects.edit', $project->id)}}" class="btn btn-primary m-1"><i
                                class="fas fa-pencil"></i></a>
                        <a href="{{route('admin.projects.show', $project->id)}}" class="btn btn-primary m-1"><i
                                class="fas fa-eye"></i></a>
                        <form action="{{route('admin.projects.destroy', $project->id)}}" method="POST" class="m-1">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection