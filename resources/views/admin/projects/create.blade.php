@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-6">
        <div class="text-center p-2">
            <h1>Nuovo progetto</h1>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                i dati inseriti non sono validi:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('admin.projects.store')}}" method="POST" enctype='multipart/form-data'>
            @csrf

            <label class="form-label">Title: </label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$errors->has('name') ? '' :old('name')}}">

            <label class="form-label">Description: </label>
            <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror">{{$errors->has('description') ? '' :old('description')}}</textarea>

            <label class="form-label">Thumb: </label>
            <input type="file" name="cover_img" class="form-control @error('cover_img') is-invalid @enderror">

            <label class="form-label">GitHub: </label>
            <input type="text" name="github_link" class="form-control @error('github_link') is-invalid @enderror" value="{{$errors->has('github_link') ? '' :old('github_link')}}">

            <div class="mt-4">
                <button type="submit" class="btn btn-primary me-3">Aggiungi</button>
            </div>
        </form>

        <div class="buttons-containr d-flex justify-content-center">
            <div class="mt-4">
                <a href="{{route('admin.projects.index')}}"><button class="btn btn-danger">Anulla</button></a>
            </div>
        </div>
    </div>
</div>
@endsection