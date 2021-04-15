@extends('layouts.app')

@section('content')
    <div class="container mx-auto text-center">
        <div style="margin-bottom: 2em;">
            <h2>Napló</h2>
        </div>

        @forelse($diaries as $diary)
            <ul class="list-group">
                <li class="list-group-item">Megbeszélés: {{ $diary->meeting_diary }}</li>            
                <li class="list-group-item">Felhasználó: {{ $diary->diary_owner }}</li>
                <li class="list-group-item">Időjárás jelentés: Teljesítmény: {{ $diary->weather_report['1'] }}
                                                               Együttműködés: {{ $diary->weather_report['2'] }}
                                                               Közérzet: {{ $diary->weather_report['3'] }}</li>
            </ul>  
        @empty  
            <p>Nincs megjeleníthető napló!</p>
        @endforelse  

        
    </div>

@endsection