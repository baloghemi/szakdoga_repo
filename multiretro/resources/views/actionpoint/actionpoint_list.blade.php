@extends('layouts.app')

@section('content')
    <div class="container mx-auto text-center">
        <div class="mb-3">
            <h2>Akciópontok</h2>
        </div> 

        @forelse ($actionpoints as $act)
        <ul class="list-group">
            <li class="list-group-item list-group-item-primary h5">{{ $act->meeting_act->name }}</li>
            <li class="list-group-item h5">Létrehozta: {{ $act->action_owner->name }}</li>
            <li class="list-group-item h5">Dátum: {{ \Carbon\Carbon::parse($act->act_date)->format('Y/m/d H:i') }}</li>            
            <li class="list-group-item h5">Szöveg: {{ $act->description }}</li>
            <li class="list-group-item h5">Státusz: {{ $act->status }}</li>
        </ul>
        @empty
            <p>Nincs megjeleníthető akciópont!</p>
        @endforelse
        
        <a class="btn btn-primary btn-lg mt-5 w-50" href="{{ route('actionpoints') }}">Vissza</a>

    </div>

@endsection