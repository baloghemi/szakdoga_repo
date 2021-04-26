@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div style="margin-bottom: 2em;">
            <h2 class="text-center">{{ $meeting->name }} naplózása</h2>
        </div>

        
        <h4>Naplózott adatok:</h4>        
        @foreach($meeting->diaries as $diary) 
            <ul class="list-group">
                <li class="list-group-item list-group-item-primary">{{ $diary->diary_owner->name }}</li>
                @if (isset($diary->weather_report))
                    <?php $weather_report = $diary->weather_report ?>
                    <li class="list-group-item">Időjárás jelentés: 
                        <ul>
                            <li>Teljesítmény: {{ weather_value($weather_report,0) }}</li>
                            <li>Csapatmunka: {{ weather_value($weather_report,1) }}</li>
                            <li>Közérzet: {{ weather_value($weather_report,2) }}</li>
                        </ul>
                    </li>
                @endif
                
                @if (isset($diary->form))
                    <li class="list-group-item">Űrlap:  
                        <ul>
                            <li>Kommunikáció: {{ $diary->form['0'] }}</li>
                            <li>Egymás segítsége, támogatása: {{ $diary->form['1'] }}</li>
                            <li>Tisztelet: {{ $diary->form['2'] }}</li>
                            <li>Tehermegosztás: {{ $diary->form['3'] }}</li>
                            <li>Munkavégzés sebessége: {{ $diary->form['4'] }}</li>
                        </ul>
                    </li>
                @endif
            </ul>                
        @endforeach

        
    </div>

@endsection