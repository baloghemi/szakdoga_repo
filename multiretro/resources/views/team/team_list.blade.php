@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="mb-3  text-center">
            <h2>Csapatok</h2>
            <br>
        </div> 

        @forelse ($teams as $team)
        <ul class="list-group" style="margin: 0 auto; float: none; margin-bottom: 10 px; width: 70%;">
            <li class="list-group-item list-group-item-primary h5">{{ $team->name }}</li>
            <li class="list-group-item h6">                
                Létrehozta: {{ $team->team_owner->name }}
            </li>
            <li class="list-group-item h6">    
                Tagok: 
                @foreach($team->users as $user)
                    {{ $user->name }}, 
                @endforeach 
            </li>
        </ul>
        <br>
        @empty
            <p>Nincs megjeleníthető csapat!</p>
        @endforelse

        <div class="text-center">
            <a class="btn btn-primary btn-lg mt-5 w-50" href="{{ route('teams') }}">Vissza</a>
        </div>

    </div>

@endsection