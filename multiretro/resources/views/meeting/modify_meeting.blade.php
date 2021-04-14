@extends('layouts.app')

@section('content')
<div style="width: 50%; " class= "mx-auto">

<h1>Megbeszélés módosítása:</h1>

    <form action="{{ isset($meeting) ? route('modifyMeeting', ['meeting_id' => $meeting->id]) : route('newMeeting') }}" method="POST">          
        @csrf
        <div>
            <label for="name">Megbeszélés neve</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Megbeszélés neve" value="{{ is_null(old('name')) && isset($meeting) ? $meeting->name : old('name') }}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div>
            <label for="meet_date">Dátum</label>
            <input type="datetime-local" class="form-control @error('meet_date') is-invalid @enderror" name="meet_date" id="meet_date" value="{{ is_null(old('meet_date')) && isset($meeting) ? $meeting->meet_date : old('meet_date') }}">
            @error('meet_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <br>

        <div>
            <h4>Választható csapatok:</h4>

            @foreach ($teams as $team)
            
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="{{$team->id}}" name="team"
                    {{is_null(old('team')) && isset($meeting) && $meeting->team->id == $team->id ? "checked" : old('team')}}>
                    <label class="form-check-label" for="team">{{ $team->name }}</label>
                </div>
           
            @endforeach   
                    
        </div>


        <br>
        <button type="submit" class="btn btn-primary">Mentés</button>

    </form>

    <div class="text-center">
        <a class="btn btn-primary btn-lg mt-5 w-50" href="{{ route('meetings') }}">Vissza</a>
    </div>
</div>
    
    
@endsection