@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="mb-3 text-center mb-5">
            <h2>Megbeszélés - {{ $meeting->name }}</h2>
        </div> 

        <h3>Adatok</h3>
        <ul class="list-group mb-5">            
            <li class="list-group-item h6">A megbeszélést létrehozta: {{ $meeting->meet_owner->name }}</li>
            <li class="list-group-item h6">Dátum: {{ \Carbon\Carbon::parse($meeting->meet_date)->format('Y/m/d H:i') }}</li>            
            <li class="list-group-item h6">Csapat: {{ $meeting->team->name }}</li>
            <li class="list-group-item h6">Csapattagok: {{ $meeting->team->users()->pluck('name') }}, 
                                                  {{ $meeting->team->team_owner->name }}</li>
        </ul>

        <h3>Hangulat - időjárás jelentés</h3>        

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col" class="text-center">
                        <img src="{{asset('img/sunny.png')}}" class= "img-fluid" alt="sunny"></th>
                    <th scope="col" class="text-center">
                        <img src="{{asset('img/cloudy.png')}}" class= "img-fluid" alt="cloudy"></th>
                    <th scope="col" class="text-center">
                        <img src="{{asset('img/rainy.png')}}" class= "img-fluid" alt="rainy"></th>
                    <th scope="col" class="text-center">
                        <img src="{{asset('img/stormy.png')}}" class= "img-fluid" alt="stormy"></th>
                </tr>
            </thead>
            <tbody>
                <form method="POST">

                    <tr>
                    <th scope="row" class="radio">Sprint állapota</th>
                        <td class="text-center">
                            <input type="radio" value="sunny" name="sprint">
                        </td>
                        <td class="text-center">
                           <input type="radio" value="cloudy" name="sprint">
                        </td>
                        <td class="text-center">
                            <input type="radio" value="rainy" name="sprint">
                        </td>
                        <td class="text-center">
                            <input type="radio" value="stormy" name="sprint">
                        </td>
                    </tr>

                    <tr>
                    <th scope="row" class="radio">Csapatmunka</th>
                        <td class="text-center">
                            <input type="radio" value="sunny" name="teamwork">
                        </td>
                        <td class="text-center">
                           <input type="radio" value="cloudy" name="teamwork">
                        </td>
                        <td class="text-center">
                            <input type="radio" value="rainy" name="teamwork">
                        </td>
                        <td class="text-center">
                            <input type="radio" value="stormy" name="teamwork">
                        </td>
                    </tr>

                    <tr>
                    <th scope="row" class="radio">Közérzet</th>
                        <td class="text-center">
                            <input type="radio" value="sunny" name="feeling">
                        </td>
                        <td class="text-center">
                           <input type="radio" value="cloudy" name="feeling">
                        </td>
                        <td class="text-center">
                            <input type="radio" value="rainy" name="feeling">
                        </td>
                        <td class="text-center">
                            <input type="radio" value="stormy" name="feeling">
                        </td>
                    </tr>

                </form>
            </tbody>
        </table>

        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-lg mt-5 w-50">Időjárás jelentés küldése</button>
        </div>


        <br>
        <h3>Kanban tábla</h3>
        <p>“Megvalósításra vár”, “Megvalósítása folyamatban”, “Megvalósítva”</p>



    </div>
             
    <div class="text-center">
        <a class="btn btn-primary btn-lg mt-5 w-50" href="{{ route('meetings') }}">Vissza</a>
    </div>

@endsection