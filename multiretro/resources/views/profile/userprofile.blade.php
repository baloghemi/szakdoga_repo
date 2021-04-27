@extends('layouts.app')

@section('content')
    <div class="container mx-auto text-center">
        <div style="margin-bottom: 2em;">
            <h2>Felhasználó adatai</h2>
        </div>

        <div class="card" style="margin: 0 auto; float: none; margin-bottom: 10 px; width: 60%;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Név: {{ Auth::user()->name }}</li>            
                <li class="list-group-item">E-mail: {{ Auth::user()->email }}</li>
            </ul>
        </div>

        <div> 
            <a class="btn btn-primary btn-lg" href="{{ route('sendToModifyUser', ['user_id' => Auth::user()->id]) }}" style="margin-top: 2em;">Adatok módosítása</a>
        </div>
    </div>

@endsection