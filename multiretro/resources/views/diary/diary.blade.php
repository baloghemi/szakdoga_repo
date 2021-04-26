@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="text-center" style="margin-bottom: 2em;">
            <h2>Napló</h2>
            <h5>A csapat/megbeszélés nevére kattintva elérhetővé válnak a hozzá tartozó naplózott adatok. 
                Csak a lezárt megbeszélés adatai jelennek meg.</h5>
        </div>

        <!--Csapatok listázása-->
        <h4>Csapatok:</h4>
        <ul>
            @foreach($teams as $team)
                <li>
                    <h6><a href="{{ route('teamDiary', ['team_id' => $team->id]) }}">{{ $team->name }}</a></h6>
                </li>
            @endforeach
        </ul>
        <br>

        <!--Megbeszélések listázása-->
        <h4>Megbeszélések:</h4>        
        <ul>
            @foreach($meetings as $meeting)
            @if($meeting->active == 'false')
                <li>
                    <h6><a href="{{ route('meetingDiary', ['meeting_id' => $meeting->id]) }}">{{ $meeting->name }}</a></h6>
                </li>
            @endif
            @endforeach
        </ul>
        <br>

        <!--Saját naplózott adatok-->    
        <h4>Saját naplózott adatok:</h4>        
        @forelse($diaries as $diary)  
        @if ($diary->diary_owner->id == Auth::user()->id and $diary->meeting_diary->active == 'false')          
            <ul class="list-group">
                <li class="list-group-item list-group-item-primary">{{ $diary->meeting_diary->name }}</li>
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
        @endif
        @empty  
            <p>Nincs megjeleníthető napló!</p>
        @endforelse  

        
    </div>

@endsection