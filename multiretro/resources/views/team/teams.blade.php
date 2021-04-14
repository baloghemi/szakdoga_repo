@extends('layouts.app')

@section('content')
    <div class="container mx-auto text-center">
        <div class="mb-2">
            <h2>Csapatok</h2>
        </div>          

        <div> 
            <a class="btn btn-primary btn-lg mt-5 w-50" href="{{ route('sendToNewTeam') }}">Új csapat létrehozása</a>
            <a class="btn btn-primary btn-lg mb-5 w-50" href="{{ route('teamList') }}" style="margin-top: 2em;">Összes csapat listázása</a>
        </div>        

    </div>

    <div class="container">
        <h3>Saját csapatok:</h3>

        @forelse ($teams as $team)
        <ul class="list-group">            
            <li class="list-group-item list-group-item-primary h5">{{ $team->name }}</li>
            <li class="list-group-item h6">    
                Tagok: {{ $team->users()->pluck('name') }} 
            </li>
        </ul>

        <div class="text-center">
            <a class="btn btn-outline-secondary btn-lg" href="{{ route('sendToModifyTeam', ['team_id' => $team->id]) }}">Szerkesztés</a>
            <a class="btn btn-outline-danger btn-lg" href="{{ route('deleteTeam', ['team_id' => $team->id]) }}">Törlés</a>
        </div>
        <br>
        
        @empty
            <p>Nincs megjeleníthető csapat!</p>
        @endforelse

        <h3>Tagságok:</h3>

        @forelse ($tagok as $tag)
            <ul class="list-group"> 
                <li class="list-group-item list-group-item-primary h5">{{ $tag->name }}</li>
                <li class="list-group-item h6">                
                    Létrehozta: {{ $tag->team_owner->name }}
                </li>
                <li class="list-group-item h6">    
                    Tagok: {{ $tag->users()->pluck('name') }} 
                </li>
            </ul>
        @empty        
            <p>Nincs megjeleníthető csapat!</p>
        @endforelse        
        
    </div>

@endsection