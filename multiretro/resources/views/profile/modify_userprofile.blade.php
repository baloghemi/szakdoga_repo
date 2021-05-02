@extends('layouts.app')

@section('content')
<div class= "mx-auto container">

    <div class="card">
        <div class="card-header h2">Adatok módosítása</div>
        <div class="card-body">
            <form action="{{ route('modifyUserProfile', ['user_id' => Auth::user()->id]) }}" method="POST">          
                @csrf
                <div class="form-group">
                    <label for="name">Felhasználó neve</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Felhasználó neve" value="{{ Auth::user()->name}}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            
                <div class="form-group">
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
                
            </form>
        </div>
    </div> 

    <div class="text-center">
        <a class="btn btn-primary btn-lg mt-5 w-50" href="{{ route('userProfile') }}">Vissza</a>
    </div>

</div>
@endsection