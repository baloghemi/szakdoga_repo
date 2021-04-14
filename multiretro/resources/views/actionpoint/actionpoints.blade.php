@extends('layouts.app')

@section('content')
    <div class="container mx-auto text-center">
        <div class="mb-3">
            <h2>Saját akciópontok</h2>

            <a class="btn btn-primary btn-lg mb-5 w-50" href="{{ route('actionpointList') }}" style="margin-top: 2em;">Összes akciópont megjelenítése</a>

        </div> 

       <h3>Kanban tábla</h3>
        <table class="table table-bordered">
            <thead>
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
                    @if($act->status == "to_do")                    
                        <div class="card">
                            <div class="card-header">{{ $act->meeting_act->name }}</div>
                            <div class="card-body">                      
                                <p class="card-text">{{ $act->description }}</p>
                                <!--<p>Státusz: {{ $act->status }}</p>-->
                            </div>
                            <div class="card-footer text-muted">
                                Módosítva: {{ \Carbon\Carbon::parse($act->modified_at)->format('Y/m/d H:i') }}           
                            </div>
                        </div>
                    <br>
                    @endif        
                @endforeach
                </td>

                <td>          
                @foreach ($actionpoints as $act)
                    @if($act->status == "doing")
                        <div class="card">
                            <div class="card-header">{{ $act->meeting_act->name }}</div>
                            <div class="card-body">                                                    
                                <p class="card-text">{{ $act->description }}</p>                                
                            </div>
                            <div class="card-footer text-muted">
                                Módosítva: {{ \Carbon\Carbon::parse($act->modified_at)->format('Y/m/d H:i') }}           
                            </div>
                        </div>
                    <br>
                    @endif                   
                @endforeach
                </td>

                <td>       
                @foreach ($actionpoints as $act)
                    @if($act->status == "done")
                        <div class="card">
                            <div class="card-header">{{ $act->meeting_act->name }}</div>
                            <div class="card-body">                                                    
                                <p class="card-text">{{ $act->description }}</p>                                
                            </div>
                            <div class="card-footer text-muted">
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


    </div>

@endsection