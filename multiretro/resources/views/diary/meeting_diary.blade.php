@extends('layouts.app')

@section('content')
    <div class="container mx-auto">    
        <div style="margin-bottom: 2em;">
            <h2 class="text-center">{{ $meeting->name }} napló</h2>
        </div>
        
        <h4 class="text-center mb-4">Átlagok</h4>   

        <div style="display: flex; justify-content: center; max-width: 350px; margin-right: auto; margin-left: auto;">
            <ul>
                <li class="h6">Időjárás jelentés: {{ weather_sum_average($meeting->diaries) }}</li>
                <li class="h6">Űrlap csapat átlag: {{ form_sum_average($meeting->diaries) }}</li>
                <li class="h6">Űrlap készség átlagok:</li>
                <ul class="h6">
                    <li>Kommunikáció: {{ form_sum_average_com($meeting->diaries) }}</li>
                    <li>Egymás segítése, támogatása: {{ form_sum_average_help($meeting->diaries) }}</li>
                    <li>Tisztelet: {{ form_sum_average_respect($meeting->diaries) }}</li>
                    <li>Tehermegosztás: {{ form_sum_average_share($meeting->diaries) }}</li>
                    <li>Munkavégzés sebessége: {{ form_sum_average_speed($meeting->diaries) }}</li>
                </ul>
                </li>
            </ul>
        </div>
        
        <br>
        <hr style="width: 35%">
        <br>
    
    <?php
        use App\Models\Diary;
        $diary = Diary::where('meeting_id', $meeting->id)->first();  
    ?>

    <div class="text-center">
        <h4>Naplózott adatok</h4>        
        <h5>Plusz-mínusz kártyák</h5>
            @forelse ($diary->meeting_diary->plus_minus_tasks as $task)
                <div class="card" style="margin: 0 auto; float: none; margin-bottom: 10 px; width: 400px;">         
                    <div class="card-header">{{$task->task_owner->name}}</div>                   
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
                <br>
            @empty
                <p>Nincs megjeleníthető plusz-mínusz kártya!</p>
            @endforelse
            <br> 
            
        <h5>Akciópontok</h5>
            @forelse ($diary->meeting_diary->actionpoints as $action)
                <div class="card" style="margin: 0 auto; float: none; margin-bottom: 10 px; width: 400px;">
                    <div class="card-header">{{ $action->action_owner->name}}</div>
                    <div class="card-body">
                        <div class="card-title">Státusz: {{ get_status($action->status) }}</div>
                        <div class="card-text">{{ $action->description }}</div>                                
                    </div>
                </div>
                <br>
            @empty
                <p>Nincs megjeleníthető akciópont!</p>
            @endforelse
        </div>

        <div class="text-center">
            <a class="btn btn-primary btn-lg mt-5 w-50" href="{{ route('diary') }}">Vissza</a>
        </div>    
    </div>

@endsection