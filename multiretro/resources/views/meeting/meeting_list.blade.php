@extends('layouts.app')

@section('content')
    <div class="container mx-auto text-center">
        <div class="mb-3">
            <h2>Megbeszélések</h2>
        </div> 

        @forelse ($meetings as $meeting)
        @if($meeting->active == 'true')
        <ul class="list-group">
            <li class="list-group-item list-group-item-primary h5">{{ $meeting->name }}</li>
            <li class="list-group-item h5">Létrehozta: {{ $meeting->meet_owner->name }}</li>
            <li class="list-group-item h5">Dátum: {{ \Carbon\Carbon::parse($meeting->meet_date)->format('Y/m/d H:i') }}</li>            
            <li class="list-group-item h5">Csapat: {{ $meeting->team->name }}</li>
        </ul>
        @endif
        @empty
            <p>Nincs megjeleníthető csapat!</p>
        @endforelse

        <a class="btn btn-primary btn-lg mt-5 w-50" href="{{ route('meetings') }}">Vissza</a>

    </div>

@endsection