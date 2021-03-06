@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="text-center" style="margin-bottom: 2em;">
            <h2>Napló</h2>
        </div>        

        <!--Megbeszélések listázása-->
        <h4 style="margin-left: 15%;">Megbeszélések:</h4>        
        <ul style="margin-left: 15%;">
            <?php $c1 = 0 ?>
            @foreach($meetings as $meeting)            
                @if($meeting->active == 'false' and ($meeting->team->users->contains(Auth::user()) or $meeting->team->team_owner == Auth::user()))
                    <li>
                    <h6><a href="{{ route('meetingDiary', ['meeting_id' => $meeting->id]) }}">{{ $meeting->name }} | {{\Carbon\Carbon::parse($meeting->meet_date)->format('Y/m/d H:i')}}</a></h6>
                    </li>
                    <?php $c1++; ?>
                @endif 
            @endforeach

            @if($c1 == 0)
                <p>Nincs megjeleníthető megbeszélés!</p>         
            @endif 
        </ul>
        <br>

        <!--Saját naplózott adatok-->    
        <h4 style="margin-left: 15%;">Saját naplózott adatok:</h4>        
        <?php $c2 = 0 ?>
        @foreach($diaries as $diary)
        @if ($diary->diary_owner->id == Auth::user()->id and $diary->meeting_diary->active == 'false')
            <?php $c2++ ?>
            <ul class="list-group" style="margin: 0 auto; float: none; margin-bottom: 10 px; width: 70%;">
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

                <li class="list-group-item">Plusz-mínusz kártyák:
                    @forelse ($diary->meeting_diary->plus_minus_tasks->where('user_id', Auth::user()->id) as $task)
                        <div class="card">                            
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
                    @forelse ($diary->meeting_diary->actionpoints->where('user_id', Auth::user()->id) as $action)
                        <div class="card">
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
        @endif
        @endforeach 

        @if($c2 == 0)
            <p style="margin-left: 15%;">Nincs megjeleníthető napló!</p>         
        @endif            

        
    </div>

@endsection