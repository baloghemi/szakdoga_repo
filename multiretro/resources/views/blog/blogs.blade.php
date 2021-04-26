@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="text-center" style="margin-bottom: 2em;">
            <h2>Blogok</h2>

            <a class="btn btn-primary btn-lg mt-5 w-50" href="{{ route('sendToNewBlog') }}">Új blog létrehozása</a>
            <a class="btn btn-primary btn-lg mb-5 w-50" href="{{ route('blogList') }}" style="margin-top: 2em;">Saját blogok megjelenítése</a>
         
            <!--Keresés mező-->
            <form action="{{ route('blogSearch') }}" method="GET">
                @csrf                    
                <table class="table" style="width: 25%; margin-left: auto; margin-right: auto;"> 
                    <tr>
                        <th scope="col">
                            <input type="text" name="tag" id="tag" placeholder="Kereső címke">
                        </th>
                        <th scope="col" class="text-center">
                            <button type="submit" class="btn btn-outline-primary">Keresés</button>   
                        </th>
                    </tr>  
                </table>

            </form>
        </div>
    
        @forelse ($blogs as $blog) 
            <div class="card" style=" margin: 0 auto; float: none; margin-bottom: 10 px; width: 50%;">        
                <div class="card-header">
                    {{ $blog->blog_owner->name }}
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
            <br>      
        @empty
            <p>Nincs megjeleníthető blog!</p>
        @endforelse
    </div>

@endsection