@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div style="margin-bottom: 2em;">
            <h2 class="text-center">Saját blogok</h2>
        </div>

        @forelse ($blogs as $blog) 
        <div class="card" style=" margin: 0 auto; float: none; margin-bottom: 10 px; width: 50%;">        
            <div class="card-header">                
                <p style="float: right;"> Módosítva: {{ \Carbon\Carbon::parse($blog->updated_at)->format('Y/m/d H:i') }}</p>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $blog->title }}</h5>
                <p class="card-text">{{ $blog->text }}</p>
            </div>       
            <div class="card-footer text-muted">                                       
                Kereső címkék: {{ $blog->tag1 }}, {{ $blog->tag2 }}, {{ $blog->tag3 }}                   
            </div>
        </div>

        <div class="text-center mt-2">
            <a class="btn btn-outline-secondary btn-lg" href="{{ route('sendToModifyBlog', ['blog_id' => $blog->id]) }}">Szerkesztés</a>
            <a class="btn btn-outline-danger btn-lg"  onclick="return confirm('Biztosan törli a blogot?')"
            href="{{ route('deleteBlog', ['blog_id' => $blog->id]) }}">Törlés</a>
        </div>  
          
        <br>      
        @empty
            <p>Nincs megjeleníthető blog!</p>
        @endforelse

        <div class="text-center">
            <a class="btn btn-primary btn-lg mt-5 w-50" href="{{ route('blogs') }}">Vissza</a>
        </div>
        
    </div>

@endsection