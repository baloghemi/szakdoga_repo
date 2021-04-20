@extends('layouts.app')

@section('content')
    <div class="container mx-auto text-center">
        <div style="margin-bottom: 2em;">
            <h2>Saját blogok</h2>
        </div>

        <div class="card">        
            @forelse ($blogs as $blog)        
                <ul class="list-group">
                    <li class="list-group-item list-group-item-primary h5">{{ $blog->title }}</li>                    
                    <li class="list-group-item h5">Módosítva: {{ \Carbon\Carbon::parse($blog->updated_at)->format('Y/m/d H:i') }}</li>            
                    <li class="list-group-item h5">Szöveg: {{ $blog->text }}</li>
                    <li class="list-group-item h5">Szöveg: {{ $blog->tags }}</li>
                </ul>   

                <div class="text-center">
                    <a class="btn btn-outline-secondary btn-lg" href="{{ route('sendToModifyBlog', ['blog_id' => $blog->id]) }}">Szerkesztés</a>
                    <a class="btn btn-outline-danger btn-lg" href="{{ route('deleteBlog', ['blog_id' => $blog->id]) }}">Törlés</a>
                </div>     
            @empty
                <p>Nincs megjeleníthető blog!</p>
            @endforelse
        </div>

        <a class="btn btn-primary btn-lg mt-5 w-50" href="{{ route('blogs') }}">Vissza</a>
        
    </div>

@endsection