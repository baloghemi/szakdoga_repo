@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="mb-3 text-center">
            <h2>Megbeszélések</h2>
            <br>
        </div> 

        @forelse ($meetings as $meeting)
            @if($meeting->active == 'true')
            <ul class="list-group" style="margin: 0 auto; float: none; margin-bottom: 10 px; width: 70%;">
                <li class="list-group-item list-group-item-primary h5">{{ $meeting->name }}</li>
                <li class="list-group-item h6">Létrehozta: {{ $meeting->meet_owner->name }}</li>
                <li class="list-group-item h6">Dátum: {{ \Carbon\Carbon::parse($meeting->meet_date)->format('Y/m/d H:i') }}</li>            
                <li class="list-group-item h6">Csapat: {{ $meeting->team->name }}</li>
            </ul>
            <br>
            @endif
        @empty
            <p>Nincs megjeleníthető csapat!</p>
        @endforelse

        <div class="text-center">
            <a class="btn btn-primary btn-lg mt-5 w-50" href="{{ route('meetings') }}">Vissza</a>
        </div>

    </div>

@endsection