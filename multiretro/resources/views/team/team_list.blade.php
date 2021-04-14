@extends('layouts.app')

@section('content')
    <div class="container mx-auto text-center">
        <div class="mb-3">
            <h2>Csapatok</h2>
        </div> 

        @forelse ($teams as $team)
        <ul class="list-group">
            <li class="list-group-item list-group-item-primary h5">{{ $team->name }}</li>
            <li class="list-group-item h6">                
                Létrehozta: {{ $team->team_owner->name }}
            </li>
            <li class="list-group-item h6">    
                Tagok: {{ $team->users()->pluck('name') }} 
            </li>
        </ul>
        @empty
            <p>Nincs megjeleníthető csapat!</p>
        @endforelse

        <a class="btn btn-primary btn-lg mt-5 w-50" href="{{ route('teams') }}">Vissza</a>

    </div>

@endsection