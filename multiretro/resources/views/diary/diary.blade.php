@extends('layouts.app')

@section('content')
    <div class="container mx-auto text-center">
        <div style="margin-bottom: 2em;">
            <h2>Napló</h2>
        </div>

        
        @forelse($diaries as $diary)            
            <ul class="list-group">
                <li class="list-group-item list-group-item-primary">Megbeszélés: {{ $diary->meeting_diary->name }}</li>            
                <li class="list-group-item">Felhasználó: {{ $diary->diary_owner->name }}</li>
                @if (isset($diary->weather_report))
                    <?php $weather_report = $diary->weather_report ?>
                    <li class="list-group-item">Időjárás jelentés: Teljesítmény: {{ weather_value($weather_report,1) }}
                                                                Csapatmunka: {{ weather_value($weather_report,2) }}
                                                                Közérzet: {{ weather_value($weather_report,3) }}
                    </li>
                @endif
                
                @if (isset($diary->form))
                    <li class="list-group-item">Úrlap:  Kommunikáció: {{ $diary->form['1'] }}
                                                        Egymás segítsége, támogatása: {{ $diary->form['2'] }}
                                                        Tisztelet: {{ $diary->form['3'] }}
                                                        Tehermegosztás: {{ $diary->form['4'] }}
                                                        Munkavégzés sebessége: {{ $diary->form['5'] }}
                    </li>
                @endif
            </ul> 
        @empty  
            <p>Nincs megjeleníthető napló!</p>
        @endforelse  

        
    </div>

@endsection