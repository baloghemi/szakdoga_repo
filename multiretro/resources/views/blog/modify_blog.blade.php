@extends('layouts.app')

@section('content')
<div style="width: 50%; " class= "mx-auto">

<h1>Blog módosítása:</h1>

    <form action="{{ isset($blog) ? route('modifyBlog', ['blog_id' => $blog->id]) : route('newBlog') }}" method="POST">          
        @csrf
        <div>
            <label for="title">Blog címe</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Blog címe" value="{{ is_null(old('title')) && isset($blog) ? $blog->title : old('title') }}">
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div>
            <label for="text">Blog címe</label>
            <input type="text" class="form-control @error('text') is-invalid @enderror" name="text" id="text" placeholder="Szöveg" value="{{ is_null(old('text')) && isset($blog) ? $blog->text : old('text') }}">
            @error('text')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div>
            <label for="tags">Címkék</label>
            <input type="text" class="form-control @error('tags') is-invalid @enderror" name="tags" id="tags" placeholder="Címkék vesszővel elválasztva szóköz nélkül" value="{{ is_null(old('tags')) && isset($blog) ? $blog->tags : old('tags') }}">
            @error('tags')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <br>
        <button type="submit" class="btn btn-primary">Mentés</button>

    </form>

    <div class="text-center">
        <a class="btn btn-primary btn-lg mt-5 w-50" href="{{ route('blogList') }}">Vissza</a>
    </div>
</div>
    
    
@endsection