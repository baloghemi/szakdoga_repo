@extends('layouts.app')

@section('content')
<div class="container mx-auto">
<div class="card">
    <div class="card-header h2">Megbeszélés módosítása</div>
    <div class="card-body">
        <form action="{{ isset($meeting) ? route('modifyMeeting', ['meeting_id' => $meeting->id]) : route('newMeeting') }}" method="POST">          
            @csrf
            <div class="form-group">
                <label class="h5" for="name">Megbeszélés neve</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Megbeszélés neve" value="{{ is_null(old('name')) && isset($meeting) ? $meeting->name : old('name') }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label class="h5" for="meet_date">Dátum</label>
                <input type="datetime-local" class="form-control @error('meet_date') is-invalid @enderror" name="meet_date" id="meet_date" value="{{ is_null(old('meet_date')) && isset($meeting) ?  date('Y-m-d\TH:i', strtotime($meeting->meet_date)) : old('meet_date') }}">
                @error('meet_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <h5>Választható csapatok:</h5>

                @foreach ($teams as $team)            
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="{{$team->id}}" name="team"
                        {{is_null(old('team')) && isset($meeting) && $meeting->team->id == $team->id ? "checked" : old('team')}}>
                        <label class="form-check-label" for="team">{{ $team->name }}</label>
                    </div>           
                @endforeach 
            </div>

            <div class="form-group">
                <h5>Választható technikák:</h5>
                
                <div class="form-check">
                    <input type="hidden" name="report" value="0">
                    <input class="form-check-input" type="checkbox" value="1" name="report"                         
                    {{is_null(old('technic')) && isset($meeting) && ($meeting->techniques['0'] == '1') ? "checked" : old('technic')}}>
                    <label class="form-check-label" for="report">Időjárás jelentés</label>
                </div>
                <div class="form-check">
                    <input type="hidden" name="plus_minus" value="0">
                    <input class="form-check-input" type="checkbox" value="1" name="plus_minus"                         
                    {{is_null(old('technic')) && isset($meeting) && ($meeting->techniques['1'] == '1')  ? "checked" : old('technic')}}>
                    <label class="form-check-label" for="plus_minus">Plusz-mínusz tábla</label>
                </div>
                <div class="form-check">
                    <input type="hidden" name="form" value="0">
                    <input class="form-check-input" type="checkbox" value="1" name="form"                         
                    {{is_null(old('technic')) && isset($meeting) && ($meeting->techniques['2'] == '1')  ? "checked" : old('technic')}}>
                    <label class="form-check-label" for="form">Űrlap</label>
                </div>
                
            </div>

            <br>
            <button type="submit" class="btn btn-primary">Mentés</button>

        </form>
        </div>
    </div>

    <div class="text-center">
        <a class="btn btn-primary btn-lg mt-5 w-50" href="{{ route('meetings') }}">Vissza</a>
    </div>
</div>
    
    
@endsection