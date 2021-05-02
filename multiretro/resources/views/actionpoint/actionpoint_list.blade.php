@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="text-center mb-5">
            <h2>Akciópontok</h2>
        </div> 
        

        @foreach ($meetings as $meeting)
        @if($meeting->active == 'true' and ($meeting->team->users->contains(Auth::user()) or $meeting->team->team_owner == Auth::user()))
        <h4 class="text-center">{{ $meeting->name }}</h4>
        <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="text-center">
                <tr>                
                    <th scope="col" style="width: 300px;">Megvalósításra vár</th>
                    <th scope="col" style="width: 300px;">Megvalósítása folyamatban</th>
                    <th scope="col" style="width: 300px;">Megvalósítva</th>
                </tr>
            </thead>
            <tbody>
                <tr>                    
                <td>            
                @foreach ($actionpoints as $act)
                    @if($act->status == "to_do" and $meeting->id == $act->meeting_act->id)                    
                        <div class="card" style="background-color: pink; width: 300px; margin-left: auto; margin-right: auto;">
                            <div class="card-body">                      
                                <h6 class="card-title">{{ $act->action_owner->name }}:</h6>
                                <p class="card-text">{{ $act->description }}</p>                                
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
                    @if($act->status == "doing" and $meeting->id == $act->meeting_act->id)
                        <div class="card" style="background-color: aquamarine; width: 300px; margin-left: auto; margin-right: auto;">
                            <div class="card-body">                                                    
                                <h6 class="card-title">{{ $act->action_owner->name }}:</h6>
                                <p class="card-text">{{ $act->description }}</p>                                
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
                    @if($act->status == "done" and $meeting->id == $act->meeting_act->id)
                        <div class="card" style="background-color: lightSkyBlue; width: 300px; margin-left: auto; margin-right: auto;">
                            <div class="card-body">                                                    
                                <h6 class="card-title">{{ $act->action_owner->name }}:</h6>
                                <p class="card-text">{{ $act->description }}</p>                                
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
        @endif
        <br>
        @endforeach

        <div class="text-center">
            <a class="btn btn-primary btn-lg mt-5 w-50" href="{{ route('actionpoints') }}">Vissza</a>
        </div>

    </div>

@endsection