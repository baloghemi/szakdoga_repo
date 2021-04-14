@extends('layouts.app')

@section('content')
<div style="width: 50%; " class= "mx-auto">

<h1>Csapat módosítása:</h1>

    <form action="{{ isset($team) ? route('modifyTeam', ['team_id' => $team->id]) : route('newTeam') }}" method="POST">          
        @csrf
        <div>
            <label for="name">Csapat neve</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Csapat neve" value="{{ is_null(old('name')) && isset($team) ? $team->name : old('name') }}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div>
            <h4>Választható csapattagok:</h4>

            @foreach ($users as $user)
            @if ($user->id != Auth::user()->id)
                <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{$user->id}}" name="people[]"                         
                        {{is_null(old('people')) && isset($team) && $team->users()->get()->pluck('id')->contains($user->id) ? "checked" : old('people')}}>
                        <label class="form-check-label" for="people{{$user->id}}">{{ $user->name }}</label>
                </div>
            @endif
            @endforeach   
                    
        </div>


        <br>
        <button type="submit" class="btn btn-primary">Mentés</button>

    </form>

    <div class="text-center">
        <a class="btn btn-primary btn-lg mt-5 w-50" href="{{ route('teams') }}">Vissza</a>
    </div>
</div>
    
    
@endsection