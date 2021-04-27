@extends('layouts.app')

@section('content')
    <div class="mx-auto text-center">
        <h1>MultiRetro</h1>
        <hr style="width: 25%">
    </div>

    <div class="container">
        <div class="row align-items-center">
            <div class="col">
                <img src="{{asset('img/cat_puzzle.png')}}" alt="cat_puzzle">
            </div>

            <div class="col" style="text-align: justify;">
                <p>A <b>MultiRetro</b> webes alkalmazás az agilis retrospektívek levezetését támogató eszköz.</p>
                <p>Regisztráció után számos funkció válik elérhetővé: csapatok létrehozása, megbeszélés szervezése, 
                   blogbejegyzés írása.</p>
                <p>A megbeszélés alatt lehetőség van akciópontok létrehozására és különböző technikák alkalmazására: időjárás jelentés, plusz-mínusz táblázat
                   és űrlap. Ezeknek az eredménye és összesített átlaga megnézhető a naplóban a megbeszélés lezárása után.</p>                
            </div>
        </div>
    </div>

    
@endsection