@extends('layouts.app')

@section('content')
    <div class="mx-auto text-center" style="width: 25%">
        <h1>MultiRetro</h1>
        <hr>
    </div>

    <div class="container">
        <div class="row align-items-center">
            <div class="col">
                <img src="{{asset('img/cat_puzzle.png')}}" class= "img-fluid" alt="cat_puzzle">
            </div>

            <div class="col" style="text-align: justify">
                <p>A <b>MultiRetro</b> webes alkalmazás az agilis retrospektívek levezetését támogató eszköz.</p>
                <p>Regisztráció után számos funkció lesz elérhető: csapatok létrehozása, megbeszélés szervezése, 
                    akciópont és blogbejegyzés létrehozása. Űrlapok kitöltésével különböző statisztikák is megnézhetők.</p>
                <p>Reméljük csapatmunkádat hatékonyabbá tudjuk tenni e weblap segítségével:)</p>
            </div>
        </div>
    </div>

    
@endsection