@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="text-center mb-3">
            <h2>Saját akciópontok</h2>

            <a class="btn btn-primary btn-lg mb-5 w-50" href="{{ route('actionpointList') }}" style="margin-top: 2em;">Összes akciópont megjelenítése</a>

            <h3>Kanban tábla</h3>            
        </div> 

        <table class="table table-bordered">
            <caption>

            </caption>
            <thead class="text-center">
                <tr>                
                    <th scope="col">Megvalósításra vár</th>
                    <th scope="col">Megvalósítása folyamatban</th>
                    <th scope="col">Megvalósítva</th>
                </tr>
            </thead>
            <tbody>
                <tr>                    
                <td>            
                @foreach ($actionpoints as $act)
                    @if($act->meeting_act->active == 'true' and $act->status == "to_do")                    
                        <div class="card" style="background-color: pink; width: 300px; margin-left: auto; margin-right: auto;">
                            <table class="card-header card-table table table-borderless text-center">
                                <thead>
                                <tr>
                                    <th scope="col" style="width:15%"></th>
                                    <th scope="col" style="width:70%">{{ $act->meeting_act->name }}</th>
                                    <th scope="col" style="width:15%">
                                        <a class="btn btn-outline-danger btn-sm" style="float: right;" 
                                        href="{{ route('statusChangeRight', ['act_id' => $act->id]) }}">></a>
                                    </th>
                                </tr>
                                </thead> 
                            </table>

                            <div class="card-body text-center">                      
                                <p class="card-text">{{ $act->description }}</p>                                
                                <a class="btn btn-outline-danger btn-sm" href="{{ route('sendToModifyActionpoint', ['act_id' => $act->id])}}">Szerkesztés</a>                                
                            </div>
                            <div class="card-footer text-center">
                                Módosítva: {{ \Carbon\Carbon::parse($act->updated_at)->format('Y/m/d H:i') }}           
                            </div>
                        </div>
                    <br>
                    @endif        
                @endforeach
                </td>

                <td>          
                @foreach ($actionpoints as $act)
                    @if($act->meeting_act->active == 'true' and $act->status == "doing")
                        <div class="card" style="background-color: aquamarine; width: 300px; margin-left: auto; margin-right: auto;">
                            <table class="card-header card-table table table-borderless text-center">
                                <thead>
                                <tr>
                                    <th scope="col" style="width:15%">
                                        <a class="btn btn-outline-success btn-sm" style="float: left;" 
                                        href="{{ route('statusChangeLeft', ['act_id' => $act->id]) }}"><</a>
                                    </th>
                                    <th scope="col" style="width:70%">{{ $act->meeting_act->name }}</th>
                                    <th scope="col" style="width:15%">
                                        <a class="btn btn-outline-success btn-sm" style="float: right;" 
                                        href="{{ route('statusChangeRight', ['act_id' => $act->id]) }}">></a>
                                    </th>
                                </tr>
                                </thead> 
                            </table>
                           
                            <div class="card-body text-center">                      
                                <p class="card-text">{{ $act->description }}</p>                                
                                <a class="btn btn-outline-success btn-sm" href="{{ route('sendToModifyActionpoint', ['act_id' => $act->id])}}">Szerkesztés</a>                                
                            </div>
                            <div class="card-footer text-center">
                                Módosítva: {{ \Carbon\Carbon::parse($act->updated_at)->format('Y/m/d H:i') }}           
                            </div>
                        </div>
                    <br>
                    @endif                   
                @endforeach
                </td>

                <td>       
                @foreach ($actionpoints as $act)
                    @if($act->meeting_act->active == 'true' and $act->status == "done")
                        <div class="card" style="background-color: lightSkyBlue; width: 300px; margin-left: auto; margin-right: auto;">
                            <table class="card-header card-table table table-borderless text-center">
                                <thead>
                                <tr>
                                    <th scope="col" style="width:15%">
                                        <a class="btn btn-outline-primary btn-sm" style="float: left;"
                                        href="{{ route('statusChangeLeft', ['act_id' => $act->id]) }}"><</a>
                                    </th>
                                    <th scope="col" style="width:70%">{{ $act->meeting_act->name }}</th>
                                    <th scope="col" style="width:15%"></th>
                                </tr>
                                </thead> 
                            </table>
                           
                            <div class="card-body text-center">                      
                                <p class="card-text">{{ $act->description }}</p>                                
                                <a class="btn btn-outline-primary btn-sm" href="{{ route('sendToModifyActionpoint', ['act_id' => $act->id])}}">Szerkesztés</a>                                
                            </div>
                            <div class="card-footer text-center">
                                Módosítva: {{ \Carbon\Carbon::parse($act->updated_at)->format('Y/m/d H:i') }}           
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