@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div style="margin-bottom: 2em;">
            <h2 class="text-center">{{ $meeting->name }} napló</h2>
        </div>

        <h4 style="margin-left: 15%;">Átlagok:</h4>   
        <ul style="margin-left: 15%;">
            <li class="h6">Időjárás jelentés: {{ weather_sum_average($meeting->diaries) }}</li>
            <li class="h6">Űrlap: {{ form_sum_average($meeting->diaries) }}</li>
        </ul>    
        <br>

        <h4 style="margin-left: 15%;">Naplózott adatok:</h4>        
        @foreach($meeting->diaries as $diary) 
            <ul class="list-group" style="margin: 0 auto; float: none; margin-bottom: 10 px; width: 70%;">
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

                <li class="list-group-item">Plusz-mínusz kártyák:
                    @forelse ($diary->meeting_diary->plus_minus_tasks->where('user_id', $diary->diary_owner->id) as $task)
                        <div class="card" style="width: 270px;">                            
                            <div class="card-body">
                                <div class="card-title">Kártya típus: {{ get_feeling($task->feeling) }}</div>
                                <div class="card-text">
                                    {{ $task->text }}
                                </div>
                            </div>
                            <div class="card-footer">
                                Negatív szavazatok: {{ $task->negative }} db<br>
                                Pozitív szavazatok: {{ $task->positive }} db
                            </div>
                        </div>
                    @empty
                        <p>Nincs megjeleníthető plusz-mínusz kártya!</p>
                    @endforelse
                </li>

                <li class="list-group-item">Akciópontok:
                    @forelse ($diary->meeting_diary->actionpoints->where('user_id', $diary->diary_owner->id) as $action)
                        <div class="card" style="width: 270px;">
                            <div class="card-body">
                                <div class="card-title">Státusz: {{ get_status($action->status) }}</div>
                                <div class="card-text">{{ $action->description }}</div>                                
                            </div>
                        </div>
                    @empty
                        <p>Nincs megjeleníthető akciópont!</p>
                    @endforelse
                </li>
                
            </ul> 
            <br>               
        @endforeach

        <div class="text-center">
            <a class="btn btn-primary btn-lg mt-5 w-50" href="{{ route('diary') }}">Vissza</a>
        </div>
        
    </div>

@endsection