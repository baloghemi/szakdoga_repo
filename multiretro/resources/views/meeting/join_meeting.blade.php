@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="mb-3 text-center mb-5">
            <h2>Megbeszélés - {{ $meeting->name }}</h2>
        </div> 

        <!--Megbeszélés adatainak kilistázása-->
        <h3>Adatok</h3>
        <ul class="list-group mb-5">            
            <li class="list-group-item h6">A megbeszélést létrehozta: {{ $meeting->meet_owner->name }}</li>
            <li class="list-group-item h6">Dátum: {{ \Carbon\Carbon::parse($meeting->meet_date)->format('Y/m/d H:i') }}</li>            
            <li class="list-group-item h6">Csapat: {{ $meeting->team->name }}</li>
            <li class="list-group-item h6">Csapattagok: {{ $meeting->team->users()->pluck('name') }}, 
                                                        {{ $meeting->team->team_owner->name }}</li>
        </ul>

        <!--Időjárás jelentés technika-->
        <h3>Hangulat - időjárás jelentés</h3>        

        <form action="{{ route('weatherReport', ['meeting_id' => $meeting->id]) }}" method="GET">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col" class="text-center">
                        <img src="{{asset('img/sunny.png')}}" class="img-fluid" alt="sunny"></th>
                    <th scope="col" class="text-center">
                        <img src="{{asset('img/cloudy.png')}}" class="img-fluid" alt="cloudy"></th>
                    <th scope="col" class="text-center">
                        <img src="{{asset('img/rainy.png')}}" class="img-fluid" alt="rainy"></th>
                    <th scope="col" class="text-center">
                        <img src="{{asset('img/stormy.png')}}" class="img-fluid" alt="stormy"></th>
                </tr>
            </thead>
                <tbody>
                    <tr>
                    <th scope="row" class="radio">Teljesítmény</th>
                        <td class="text-center">
                            <input type="radio" value="1" name="performance">                            
                        </td>
                        <td class="text-center">
                            <input type="radio" value="2" name="performance">
                        </td>
                        <td class="text-center">
                            <input type="radio" value="3" name="performance">
                        </td>
                        <td class="text-center">
                            <input type="radio" value="4" name="performance">
                        </td>
                    </tr>

                    <tr>
                    <th scope="row" class="radio">Együttműködés</th>
                        <td class="text-center">
                            <input type="radio" value="1" name="collaboration"> 
                        </td>
                        <td class="text-center">
                            <input type="radio" value="2" name="collaboration">
                        </td>
                        <td class="text-center">
                            <input type="radio" value="3" name="collaboration">
                        </td>
                        <td class="text-center">
                            <input type="radio" value="4" name="collaboration">
                        </td>
                    </tr>

                    <tr>
                    <th scope="row" class="radio">Közérzet</th>
                        <td class="text-center">
                            <input type="radio" value="1" name="feeling">
                        </td>
                        <td class="text-center">
                            <input type="radio" value="2" name="feeling">
                        </td>
                        <td class="text-center">
                            <input type="radio" value="3" name="feeling">
                        </td>
                        <td class="text-center">
                            <input type="radio" value="4" name="feeling">
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg mt-4 w-50">Időjárás jelentés küldése</button>
            </div>
        </form>

        <!--Idójárás jelentés eredmények átlaga-->
        <h3>Eredmények:</h3>
        <div class="card">
            <div class="card-body">
            </div>
        </div>

        <!--Plusz-mínusz feladat létrehozásának helye-->
        <div class="card mb-4 mt-4">
            <h3 class="card-header">Plusz-mínusz kártya létrehozása</h3>
            <div class="card-body">

            <form action="{{ route('newPlusMinusTask', ['meeting_id' => $meeting->id]) }}" method="GET">                      
                <div>
                    <label for="description" class="h5">Kártya leírása</label>
                    <textarea rows="4" cols="50" class="form-control @error('text') is-invalid @enderror" name="text" id="text" placeholder="Plusz-mínusz kártya leírása"></textarea>
                    @error('text')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            
                <h5 class="mt-2">Tulajdonság:</h5>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="0" name="feeling">
                    <label class="form-check-label" for="feeling">Pozitív</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="1" name="feeling">
                    <label class="form-check-label" for="feeling">Negatív</label>
                </div>           
                
                <br>
                <button type="submit" class="btn btn-primary">Mentés</button>            

            </form>            
            </div>
        </div>

        <!--Plusz-mínusz feladat tábla-->
        <h3>Plusz-mínusz tábla</h3>
        <table class="table table-bordered">
            <thead class="text-center">
                <tr>                
                    <th scope="col" style="width:50%">Pozitív</th>
                    <th scope="col" style="width:50%">Negatív</th>                   
                </tr>
            </thead>
            <tbody>
                <tr>                    
                <td>            
                @foreach ($meeting->plus_minus_tasks as $task)
                    @if($task->feeling == "0")                    
                        <div class="card" style="background-color: pink">
                            <table class="card-header card-table table table-borderless text-center">
                                <thead>
                                <tr>
                                    <th scope="col" style="width:20%">
                                        {{ $task->positive }}
                                        <a class="btn btn-outline-danger btn-sm" style="float: left;"
                                        href="{{ route('positiveAdd', ['task_id' => $task->id]) }}">+</a>
                                    </th>
                                    <th scope="col" style="width:60%">{{ $task->task_owner->name }}</th>
                                    <th scope="col" style="width:20%">
                                        {{ $task->negative }}
                                        <a class="btn btn-outline-primary btn-sm" style="float: right;" 
                                        href="{{ route('negativeAdd', ['task_id' => $task->id]) }}">-</a>
                                    </th>
                                </tr>
                                </thead> 
                            </table>

                            <div class="card-body">                      
                                <p class="card-text">{{ $task->text }}</p>                                
                            </div>
                            <div class="card-footer text-center">
                                Létrehozva: {{ \Carbon\Carbon::parse($task->created_at)->format('Y/m/d H:i') }}           
                            </div>
                        </div>
                    <br>
                    @endif        
                @endforeach
                </td>

                <td>            
                    @foreach ($meeting->plus_minus_tasks as $task)
                    @if($task->feeling == "1")                    
                        <div class="card" style="background-color: lightSkyBlue">
                            <table class="card-header card-table table table-borderless text-center">
                                <thead>
                                <tr>
                                    <th scope="col" style="width:20%">
                                        {{ $task->positive }}
                                        <a class="btn btn-outline-danger btn-sm" style="float: left;"
                                        href="{{ route('positiveAdd', ['task_id' => $task->id]) }}">+</a>
                                    </th>
                                    <th scope="col" style="width:60%">{{ $task->task_owner->name }}</th>
                                    <th scope="col" style="width:20%">
                                        {{ $task->negative }}
                                        <a class="btn btn-outline-primary btn-sm" style="float: right;" 
                                        href="{{ route('negativeAdd', ['task_id' => $task->id]) }}">-</a>
                                    </th>
                                </tr>
                                </thead> 
                            </table>

                            <div class="card-body">                      
                                <p class="card-text">{{ $task->text }}</p>                                
                            </div>
                            <div class="card-footer text-center">
                                Létrehozva: {{ \Carbon\Carbon::parse($task->created_at)->format('Y/m/d H:i') }}           
                            </div>
                        </div>
                    <br>
                    @endif        
                @endforeach
                </td>
                
                </tr>
            </tbody>
        </table>         
        

        <!--Akciópontok létrehozásának helye-->        
        <div class="card mb-4 mt-4">
        <h3 class="card-header">Akciópont létrehozása</h3>
            <div class="card-body">

            <form action="{{ route('newActionpoint', ['meeting_id' => $meeting->id]) }}" method="GET">                      
                <div>
                    <label for="description" class="h5">Akciópont leírása</label>
                    <textarea rows="4" cols="50" class="form-control @error('description') is-invalid @enderror" name="description" id="description" placeholder="Akciópont leírása"></textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            
                <h5 class="mt-2">Választható felhasználók:</h5>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="{{$meeting->team->team_owner->id}}" name="user">
                    <label class="form-check-label" for="user">{{ $meeting->team->team_owner->name }}</label>
                </div>
                @foreach ($meeting->team->users as $user)            
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="{{$user->id}}" name="user">
                        <label class="form-check-label" for="user">{{ $user->name }}</label>
                    </div>           
                @endforeach 
                
                <br>
                <button type="submit" class="btn btn-primary">Mentés</button>            

            </form>            
            </div>
        </div>

        <!--Kanban tábla az akciópontokkal-->
        <h3>Kanban tábla</h3>
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
                @foreach ($meeting->actionpoints as $act)
                    @if($act->status == "to_do")                    
                        <div class="card" style="background-color: pink">
                            <table class="card-header card-table table table-borderless text-center">
                                <thead>
                                <tr>
                                    <th scope="col" style="width:15%"></th>
                                    <th scope="col" style="width:70%">{{ $act->action_owner->name }}</th>
                                    <th scope="col" style="width:15%">
                                        <a class="btn btn-outline-danger btn-sm" style="float: right;" 
                                        href="{{ route('statusChangeRightMeeting', ['act_id' => $act->id]) }}">></a>
                                    </th>
                                </tr>
                                </thead> 
                            </table>

                            <div class="card-body">                      
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
                @foreach ($meeting->actionpoints as $act)
                    @if($act->status == "doing")
                        <div class="card" style="background-color: aquamarine">
                            <table class="card-header card-table table table-borderless text-center">
                                <thead>
                                <tr>
                                    <th scope="col" style="width:15%">
                                        <a class="btn btn-outline-success btn-sm" style="float: left;" 
                                        href="{{ route('statusChangeLeftMeeting', ['act_id' => $act->id]) }}"><</a>
                                    </th>
                                    <th scope="col" style="width:70%">{{ $act->action_owner->name }}</th>
                                    <th scope="col" style="width:15%">
                                        <a class="btn btn-outline-success btn-sm" style="float: right;" 
                                        href="{{ route('statusChangeRightMeeting', ['act_id' => $act->id]) }}">></a>
                                    </th>
                                </tr>
                                </thead> 
                            </table>
                           
                            <div class="card-body">                      
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
                @foreach ($meeting->actionpoints as $act)
                    @if($act->status == "done")
                        <div class="card" style="background-color: lightSkyBlue">
                            <table class="card-header card-table table table-borderless text-center">
                                <thead>
                                <tr>
                                    <th scope="col" style="width:15%">
                                        <a class="btn btn-outline-primary btn-sm" style="float: left;"
                                        href="{{ route('statusChangeLeftMeeting', ['act_id' => $act->id]) }}"><</a>
                                    </th>
                                    <th scope="col" style="width:70%">{{ $act->action_owner->name }}</th>
                                    <th scope="col" style="width:15%"></th>
                                </tr>
                                </thead> 
                            </table>
                           
                            <div class="card-body">                      
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

    <!--Megbeszélés lezárása-->
    @if(Auth::user()->id == $meeting->meet_owner->id)
        <div class="text-center">
            <a class="btn btn-outline-danger btn-lg mt-5 w-50" href="{{ route('endMeeting', ['meeting_id' => $meeting->id]) }}">Megbeszélés lezárása</a>
        </div>
    @endif

    <div class="text-center">
        <a class="btn btn-primary btn-lg mt-5 w-50" href="{{ route('meetings') }}">Vissza</a>
    </div>

@endsection