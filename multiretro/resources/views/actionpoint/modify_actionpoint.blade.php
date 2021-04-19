@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="card mb-4 mt-4">
        <h3 class="card-header">Akciópont módosítása
            <a class="btn btn-danger btn-lg" style="float: right;" href="{{ route('deleteActionpoint', ['act_id' => $action->id]) }}">Akciópont törlése</a>
        </h3>
            <div class="card-body">

            <form action="{{ route('modifyActionpoint', ['act_id' => $action->id]) }}" method="POST">  
                @csrf                    
                <div>
                    <label for="description" class="h5">Akciópont leírása</label>
                <textarea rows="4" cols="50" class="form-control @error('description') is-invalid @enderror" name="description" id="description" placeholder="Akciópont leírása">{{ $action->description }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            
                <h5 class="mt-2">Választható felhasználók:</h5>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="{{$action->meeting_act->team->team_owner->id}}" name="user"
                    {{is_null(old('action')) && isset($action) && $action->user_id == $action->meeting_act->team->team_owner->id ? "checked" : old('action')}}>
                    <label class="form-check-label" for="user">{{ $action->meeting_act->team->team_owner->name }}</label>
                </div>
                @foreach ($action->meeting_act->team->users as $user)            
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="{{$user->id}}" name="user"
                        {{is_null(old('action')) && isset($action) && $action->user_id == $user->id ? "checked" : old('action')}}>
                        <label class="form-check-label" for="user">{{ $user->name }}</label>
                    </div>           
                @endforeach 
                
                <br>
                <button type="submit" class="btn btn-primary">Mentés</button>            

            </form>            
            </div>
        </div>

        <div class="text-center">
            <a class="btn btn-primary btn-lg mt-5 w-50" href="{{ route('actionpoints') }}">Vissza</a>
        </div>
    </div>

@endsection