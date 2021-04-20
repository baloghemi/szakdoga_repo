@extends('layouts.app')

@section('content')
    <div class="container mx-auto text-center">
        <div style="margin-bottom: 2em;">
            <h2>Blogok</h2>

            <a class="btn btn-primary btn-lg mt-5 w-50" href="{{ route('sendToNewBlog') }}">Új blog létrehozása</a>
            <a class="btn btn-primary btn-lg mb-5 w-50" href="{{ route('blogList') }}" style="margin-top: 2em;">Saját blogok megjelenítése</a>
         
        </div>

        <div class="card">        
            @forelse ($blogs as $blog)        
                <ul class="list-group">
                    <li class="list-group-item list-group-item-primary h5">{{ $blog->title }}</li>
                    <li class="list-group-item h5">Létrehozta: {{ $blog->blog_owner->name }}</li>
                    <li class="list-group-item h5">Módosítva: {{ \Carbon\Carbon::parse($blog->updated_at)->format('Y/m/d H:i') }}</li>            
                    <li class="list-group-item h5">Szöveg: {{ $blog->text }}</li>
                    <li class="list-group-item h5">Szöveg: {{ $blog->tags }}</li>
                </ul>        
            @empty
                <p>Nincs megjeleníthető blog!</p>
            @endforelse
        </div>
        
    </div>

@endsection