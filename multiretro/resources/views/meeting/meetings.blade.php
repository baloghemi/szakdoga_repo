@extends('layouts.app')

@section('content')
    <div class="container mx-auto text-center">
        <div style="margin-bottom: 2em;">
            <h2>Megbeszélések</h2>
             
            <a class="btn btn-primary btn-lg mt-5 w-50" href="{{ route('sendToNewMeeting') }}">Új megbeszélés létrehozása</a>
            <a class="btn btn-primary btn-lg mb-5 w-50" href="{{ route('meetingList') }}" style="margin-top: 2em;">Összes megbeszélés listázása</a>
         
        </div>
    </div>

    <div class="container">
        <h4 style="margin-left: 15%;">Saját megbeszélések</h4>

        <ul class="list-group"  style="margin: 0 auto; float: none; margin-bottom: 10 px; width: 70%;">
            @forelse ($meetings as $meeting)
            @if($meeting->active == 'true')
                <li class="list-group-item list-group-item-primary h5">
                    {{ $meeting->name }} <a class="btn btn-outline-primary btn-lg" style="float: right;" 
                                            href="{{ route('joinMeeting', ['meeting_id' => $meeting->id]) }}">
                                         Megnyitás</a>
                </li>
                <li class="list-group-item h6">Létrehozta: {{ $meeting->meet_owner->name }}</li>
                <li class="list-group-item h6">Dátum: {{ \Carbon\Carbon::parse($meeting->meet_date)->format('Y/m/d H:i') }}</li>
                <li class="list-group-item h6">Csapat: {{ $meeting->team->name }}</li>

                <div class="text-center">
                    <a class="btn btn-outline-secondary btn-lg" href="{{ route('sendToModifyMeeting', ['meeting_id' => $meeting->id]) }}">Szerkesztés</a>
                    <a class="btn btn-outline-danger btn-lg" onclick="return confirm('Biztosan törölni szeretné a megbeszélést? Minden hozzá tartozó akciópont és naplózott adat törlődni fog!')"
                        href="{{ route('deleteMeeting', ['meeting_id' => $meeting->id]) }}">Törlés</a>
                </div>
                <br>
            @endif
            @empty  
                <p>Nincs megjeleníthető megbeszélés!</p>
            @endforelse
        </ul>  

        <h4 style="margin-left: 15%;">Megbeszélések</h4>
        
        <?php $c = 0 ?>
        @foreach ($teams as $team)                
            @if ($team->users()->pluck('name')->contains(Auth::user()->name) or $team->team_owner->name == Auth::user()->name)                
                @foreach ($all_meet as $meet)  
                    @if ($meet->active == 'true' and $team->meetings()->pluck('id')->contains($meet->id) 
                        and $meet->meet_owner->name != Auth::user()->name)
                    <ul class="list-group"  style="margin: 0 auto; float: none; margin-bottom: 10 px; width: 70%;">
                        <li class="list-group-item list-group-item-primary h5">
                            {{ $meet->name }}  <a class="btn btn-outline-primary btn-lg" style="float: right;" 
                                                  href="{{ route('joinMeeting', ['meeting_id' => $meet->id]) }}">Megnyitás</a>
                        </li>
                        <li class="list-group-item h6">Létrehozta: {{ $meet->meet_owner->name }}</li>
                        <li class="list-group-item h6">Dátum: {{ \Carbon\Carbon::parse($meet->meet_date)->format('Y/m/d H:i') }}</li>
                        <li class="list-group-item h6">Csapat: {{ $meet->team->name }}</li>              
                    </ul>  
                    <br>
                    <?php $c++; ?>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if($c == 0)
            <p style="margin-left: 15%;">Nincs megjeleníthető megbeszélés!</p>         
        @endif 


    </div>  

@endsection