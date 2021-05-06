@extends('layouts.app')

@section('content')
<div class= "container mx-auto">

    <div class="card">
        <div class="card-header h2">Blog módosítása</div>
        <div class="card-body">
            <form action="{{ isset($blog) ? route('modifyBlog', ['blog_id' => $blog->id]) : route('newBlog') }}" method="POST">          
                @csrf
                <div class="form-group">
                    <label for="title" class="h5">Blog címe</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Blog címe" value="{{ is_null(old('title')) && isset($blog) ? $blog->title : old('title') }}">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="text" class="h5">Leírás</label>
                    <textarea rows="4" cols="50" class="form-control @error('text') is-invalid @enderror" name="text" id="text" placeholder="Szöveg" value="{{ is_null(old('text')) && isset($blog) ? $blog->text : old('text') }}">{{ is_null(old('text')) && isset($blog) ? $blog->text : old('text') }}</textarea>
                    @error('text')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tag1" class="h5">Első címke</label>
                    <input type="text" class="form-control @error('tag1') is-invalid @enderror" name="tag1" id="tag1" placeholder="Első címke" value="{{ is_null(old('tag1')) && isset($blog) ? $blog->tag1 : old('tag1') }}">
                    @error('tag1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tag2">Második címke (választható)</label>
                    <input type="text" class="form-control @error('tag2') is-invalid @enderror" name="tag2" id="tag2" placeholder="Második címke" value="{{ is_null(old('tag2')) && isset($blog) ? $blog->tag2 : old('tag2') }}">
                    @error('tag2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tag3">Harmadik címke (választható)</label>
                    <input type="text" class="form-control @error('tag3') is-invalid @enderror" name="tag3" id="tag3" placeholder="Harmadik címke" value="{{ is_null(old('tag3')) && isset($blog) ? $blog->tag3 : old('tag3') }}">
                    @error('tag3')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <br>
                <button type="submit" class="btn btn-primary">Mentés</button>

            </form>
        </div>
    </div>

    <div class="text-center">
        <a class="btn btn-primary btn-lg mt-5 w-50" href="{{ route('blogList') }}">Vissza</a>
    </div>
</div>
    
    
@endsection