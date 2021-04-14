@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="text-center mb-4">
            <h2>Akciópontok</h2>
        </div> 

        <!--@forelse ($actionpoints as $act)
        <ul class="list-group">
            <li class="list-group-item list-group-item-primary h5">{{ $act->meeting_act->name }}</li>
            <li class="list-group-item h5">Létrehozta: {{ $act->action_owner->name }}</li>
            <li class="list-group-item h5">Dátum: {{ \Carbon\Carbon::parse($act->act_date)->format('Y/m/d H:i') }}</li>            
            <li class="list-group-item h5">Szöveg: {{ $act->description }}</li>
            <li class="list-group-item h5">Státusz: {{ $act->status }}</li>
        </ul>
        @empty
            <p>Nincs megjeleníthető akciópont!</p>
        @endforelse-->

        @foreach ($meetings as $meeting)
        <h4 class="text-center">{{ $meeting->name }}</h4>
        <table class="table table-bordered">
            <thead class="text-center">
                <tr>                
                    <th scope="col" style="width:33%">Megvalósításra vár</th>
                    <th scope="col" style="width:33%">Megvalósítása folyamatban</th>
                    <th scope="col" style="width:33%">Megvalósítva</th>
                </tr>
            </thead>
            <tbody>
                <tr>                    
                <td>            
                @foreach ($actionpoints as $act)
                    @if($act->status == "to_do" and $meeting->id == $act->meeting_act->id)                    
                        <div class="card" style="background-color: pink">
                            <div class="card-body">                      
                                <h6 class="card-title">{{ $act->action_owner->name }}:</h6>
                                <p class="card-text">{{ $act->description }}</p>
                                <!--<p>Státusz: {{ $act->status }}</p>-->
                            </div>
                            <div class="card-footer text-center">
                                Módosítva: {{ \Carbon\Carbon::parse($act->modified_at)->format('Y/m/d H:i') }}           
                            </div>
                        </div>
                    <br>
                    @endif        
                @endforeach
                </td>

                <td>          
                @foreach ($actionpoints as $act)
                    @if($act->status == "doing" and $meeting->id == $act->meeting_act->id)
                        <div class="card" style="background-color: aquamarine">
                            <div class="card-body">                                                    
                                <h6 class="card-title">{{ $act->action_owner->name }}:</h6>
                                <p class="card-text">{{ $act->description }}</p>                                
                            </div>
                            <div class="card-footer text-center">
                                Módosítva: {{ \Carbon\Carbon::parse($act->modified_at)->format('Y/m/d H:i') }}           
                            </div>
                        </div>
                    <br>
                    @endif                   
                @endforeach
                </td>

                <td>       
                @foreach ($actionpoints as $act)
                    @if($act->status == "done" and $meeting->id == $act->meeting_act->id)
                        <div class="card" style="background-color: lightSkyBlue">
                            <div class="card-body">                                                    
                                <h6 class="card-title">{{ $act->action_owner->name }}:</h6>
                                <p class="card-text">{{ $act->description }}</p>                                
                            </div>
                            <div class="card-footer text-center">
                                Módosítva: {{ \Carbon\Carbon::parse($act->modified_at)->format('Y/m/d H:i') }}           
                            </div>
                        </div>          
                    <br>
                    @endif
                @endforeach
                </td>
                </tr>
            </tbody>
        </table> 
        @endforeach

        <div class="text-center">
            <a class="btn btn-primary btn-lg mt-5 w-50" href="{{ route('actionpoints') }}">Vissza</a>
        </div>

    </div>

@endsection