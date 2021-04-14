@extends('layouts.app')

@section('content')
<div style="width: 50%; " class= "mx-auto">

    <h2>Adatok módosítása:</h2>

    <form action="{{ route('modifyUserProfile', ['user_id' => Auth::user()->id]) }}" method="POST">          
        @csrf
        <div>
            <label for="name">Felhasználó neve</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Felhasználó neve" value="{{ Auth::user()->name}}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
       
        <div>
            <label for="email">E-mail cím</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="abc@abc.hu" value="{{ Auth::user()->email }}">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        
        <br>
        <button type="submit" class="btn btn-primary">Mentés</button>
        <div class="text-center">
            <a class="btn btn-primary btn-lg mt-5 w-50" href="{{ route('userProfile') }}">Vissza</a>
        </div>

    </form>


</div>
@endsection