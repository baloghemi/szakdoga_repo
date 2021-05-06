@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="mb-3 text-center mb-5">
            <h2>Megbeszélés - {{ $meeting->name }}</h2>
        </div> 

        <!--Megbeszélés adatainak kilistázása-->
        <div class="card">
            <div class="card-header h3">Adatok</div>            
            <ul class="list-group list-group-flush">            
                <li class="list-group-item h6">A megbeszélést létrehozta: {{ $meeting->meet_owner->name }}</li>
                <li class="list-group-item h6">Dátum: {{ \Carbon\Carbon::parse($meeting->meet_date)->format('Y/m/d H:i') }}</li>            
                <li class="list-group-item h6">Csapat: {{ $meeting->team->name }}</li>
                <li class="list-group-item h6">
                    Csapattagok: 
                    {{ $meeting->team->team_owner->name }},
                    @foreach($meeting->team->users as $user)
                        {{ $user->name }}, 
                    @endforeach
                </li>
            </ul>            
        </div>
        <br>
        <hr style="width: 50%">
        <br>

        <!--Időjárás jelentés technika-->
        <?php 
            use App\Models\Diary;
            $diary = Diary::where('user_id', Auth::user()->id)->where('meeting_id', $meeting->id)->first();            
            $weather_report = isset($diary) ? $diary->weather_report : null;            
            $form = isset($diary) ? $diary->form : null;            
        ?>     

        @if($meeting->techniques['0'] == '1')
            <a name="weather_report"></a>
            <h3>Hangulat - időjárás jelentés</h3>   

            <form action="{{ URL::route('weatherReport', ['meeting_id' => $meeting->id]) }}#weather_report" method="GET"> 
            <div class="table-responsive">       
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col" class="text-center">
                            <img src="{{asset('img/sunny.png')}}" class="img-responsive" alt="sunny"></th>
                        <th scope="col" class="text-center">
                            <img src="{{asset('img/cloudy.png')}}" class="img-responsive" alt="cloudy"></th>
                        <th scope="col" class="text-center">
                            <img src="{{asset('img/rainy.png')}}" class="img-responsive" alt="rainy"></th>
                        <th scope="col" class="text-center">
                            <img src="{{asset('img/stormy.png')}}" class="img-responsive" alt="stormy"></th>
                    </tr>
                </thead>
                    <tbody>
                        <tr>
                        <th scope="row" class="radio">Teljesítmény</th>
                            <td class="text-center">
                                <input type="radio" value="1" name="performance"                            
                                {{is_null(old('performance')) && isset($weather_report) && $weather_report['0'] == '1' ? "checked" : old('performance')}}>
                            </td>
                            <td class="text-center">
                                <input type="radio" value="2" name="performance"
                                {{is_null(old('performance')) && isset($weather_report) && $weather_report['0'] == '2' ? "checked" : old('performance')}}>
                            </td>
                            <td class="text-center">
                                <input type="radio" value="3" name="performance"
                                {{is_null(old('performance')) && isset($weather_report) && $weather_report['0'] == '3' ? "checked" : old('performance')}}>
                            </td>
                            <td class="text-center">
                                <input type="radio" value="4" name="performance"
                                {{is_null(old('performance')) && isset($weather_report) && $weather_report['0'] == '4' ? "checked" : old('performance')}}>
                            </td>
                        </tr>

                        <tr>
                        <th scope="row" class="radio">Együttműködés</th>
                            <td class="text-center">
                                <input type="radio" value="1" name="collaboration"
                                {{is_null(old('collaboration')) && isset($weather_report) && $weather_report['1'] == '1' ? "checked" : old('collaboration')}}> 
                            </td>
                            <td class="text-center">
                                <input type="radio" value="2" name="collaboration"
                                {{is_null(old('collaboration')) && isset($weather_report) && $weather_report['1'] == '2' ? "checked" : old('collaboration')}}>
                            </td>
                            <td class="text-center">
                                <input type="radio" value="3" name="collaboration"
                                {{is_null(old('collaboration')) && isset($weather_report) && $weather_report['1'] == '3' ? "checked" : old('collaboration')}}>
                            </td>
                            <td class="text-center">
                                <input type="radio" value="4" name="collaboration"
                                {{is_null(old('collaboration')) && isset($weather_report) && $weather_report['1'] == '4' ? "checked" : old('collaboration')}}>
                            </td>
                        </tr>

                        <tr>
                        <th scope="row" class="radio">Közérzet</th>
                            <td class="text-center">
                                <input type="radio" value="1" name="feeling"
                                {{is_null(old('feeling')) && isset($weather_report) && $weather_report['2'] == '1' ? "checked" : old('feeling')}}>
                            </td>
                            <td class="text-center">
                                <input type="radio" value="2" name="feeling"
                                {{is_null(old('feeling')) && isset($weather_report) && $weather_report['2'] == '2' ? "checked" : old('feeling')}}>
                            </td>
                            <td class="text-center">
                                <input type="radio" value="3" name="feeling"
                                {{is_null(old('feeling')) && isset($weather_report) && $weather_report['2'] == '3' ? "checked" : old('feeling')}}>
                            </td>
                            <td class="text-center">
                                <input type="radio" value="4" name="feeling"
                                {{is_null(old('feeling')) && isset($weather_report) && $weather_report['2'] == '4' ? "checked" : old('feeling')}}>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>

                @if(!isset($weather_report))
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg mt-4 w-50">Időjárás jelentés küldése</button>
                    </div>
                @endif
            </form>

            <!--Időjárás jelentés eredmények átlaga-->
            @if(isset($weather_report))
            <div class="card">
                <h3 class="card-header">Eredmények:</h3>
                <div class="card-body">
                    <h5>Saját átlag: {{ weather_average($weather_report) }}</h5>
                    <h5>Csapat átlag: {{ weather_sum_average($meeting->diaries) }}</h5>
                </div>
                </div>
            @endif
            <br>
            <hr style="width: 50%">
            <br>
        @endif


        @if($meeting->techniques['1'] == '1')
            <!--Plusz-mínusz feladat létrehozásának helye-->
            <div class="card mb-4 mt-4">
                <a name="plus_minus_task"></a>
                <h3 id="plus_minus_task" class="card-header">Plusz-mínusz kártya létrehozása</h3>
                <div class="card-body">

                <form action="{{ URL::route('newPlusMinusTask', ['meeting_id' => $meeting->id]) }}#plus_minus_task" method="GET">                      
                    <div>
                        <label for="description" class="h5">Kártya leírása</label>
                    <textarea rows="4" cols="50" class="form-control @error('text') is-invalid @enderror" name="text" id="text" placeholder="Plusz-mínusz kártya leírása">{{old('text')}}</textarea>
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
            <a name="plus_minus_task_table"></a>
            <h3>Plusz-mínusz tábla</h3>
            <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>                
                        <th scope="col" style="width: 430px;">Pozitív</th>
                        <th scope="col" style="width: 430px;">Negatív</th>                   
                    </tr>
                </thead>
                <tbody>
                    <tr>                    
                    <td>            
                    @foreach ($meeting->plus_minus_tasks as $task)
                        @if($task->feeling == "0")                    
                            <div class="card" style="width: 430px; background-color: pink; margin-left: auto; margin-right: auto;">
                                <table class="card-header card-table table table-borderless text-center">
                                    <thead>
                                    <tr>
                                        <th scope="col" style="width:20%">
                                            {{ $task->positive }}
                                            @if(Auth::user()->id != $task->task_owner->id)
                                                <a class="btn btn-outline-danger btn-sm" style="float: left;"
                                                href="{{ URL::route('positiveAdd', ['task_id' => $task->id]) }}#plus_minus_task_table">+</a>
                                            @else +
                                            @endif
                                        </th>
                                        <th scope="col" style="width:60%">{{ $task->task_owner->name }}</th>
                                        <th scope="col" style="width:20%">
                                            {{ $task->negative }}
                                            @if(Auth::user()->id != $task->task_owner->id)
                                                <a class="btn btn-outline-primary btn-sm" style="float: right;" 
                                                href="{{ URL::route('negativeAdd', ['task_id' => $task->id]) }}#plus_minus_task_table">-</a>
                                            @else -
                                            @endif
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
                            <div class="card" style="width: 430px; background-color: lightSkyBlue; margin-left: auto; margin-right: auto;">
                                <table class="card-header card-table table table-borderless text-center">
                                    <thead>
                                    <tr>
                                        <th scope="col" style="width:20%">
                                            {{ $task->positive }}
                                            @if(Auth::user()->id != $task->task_owner->id)
                                                <a class="btn btn-outline-danger btn-sm" style="float: left;"
                                                href="{{ URL::route('positiveAdd', ['task_id' => $task->id]) }}#plus_minus_task_table">+</a>
                                            @else +
                                            @endif
                                        </th>
                                        <th scope="col" style="width:60%">{{ $task->task_owner->name }}</th>
                                        <th scope="col" style="width:20%">
                                            {{ $task->negative }}
                                            @if(Auth::user()->id != $task->task_owner->id)
                                                <a class="btn btn-outline-primary btn-sm" style="float: right;" 
                                                href="{{ URL::route('negativeAdd', ['task_id' => $task->id]) }}#plus_minus_task_table">-</a>
                                            @else -
                                            @endif
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
            </div>    
            <br>
            <hr style="width: 50%">
            <br>    
        @endif

        @if($meeting->techniques['2'] == '1')
            <a name="form"></a>
            @if(!(isset($form)))
            <!--Űrlap technika-->
            <h3>Űrlap - Csapatban való készségek felmérése</h3>
            <h5>Mennyire vagy elégedett a következőkkel a csapatban? (1 - Egyáltalán nem, 5 - Teljes mértékben)</h5>

            <form action="{{ URL::route('form', ['meeting_id' => $meeting->id]) }}#form" method="GET">
            <div class="table-responsive">       
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col" class="text-center">1</th>
                        <th scope="col" class="text-center">2</th>
                        <th scope="col" class="text-center">3</th>                        
                        <th scope="col" class="text-center">4</th>                        
                        <th scope="col" class="text-center">5</th>                        
                    </tr>
                </thead>
                    <tbody>
                        <tr>
                        <th scope="row" class="radio">Kommunikáció</th>
                            <td class="text-center">
                                <input type="radio" value="1" name="communication">
                            </td>
                            <td class="text-center">
                                <input type="radio" value="2" name="communication">
                            </td>
                            <td class="text-center">
                                <input type="radio" value="3" name="communication">
                            </td>     
                            <td class="text-center">
                                <input type="radio" value="4" name="communication">
                            </td> 
                            <td class="text-center">
                                <input type="radio" value="5" name="communication">
                            </td>                        
                        </tr>

                        <tr>
                        <th scope="row" class="radio">Egymás segítése, támogatása</th>
                            <td class="text-center">
                                <input type="radio" value="1" name="help"> 
                            </td>
                            <td class="text-center">
                                <input type="radio" value="2" name="help">
                            </td>
                            <td class="text-center">
                                <input type="radio" value="3" name="help">
                            </td>
                            <td class="text-center">
                                <input type="radio" value="4" name="help">
                            </td>
                            <td class="text-center">
                                <input type="radio" value="5" name="help">
                            </td>
                        </tr>

                        <tr>
                        <th scope="row" class="radio">Tisztelet</th>
                            <td class="text-center">
                                <input type="radio" value="1" name="respect">
                            </td>
                            <td class="text-center">
                                <input type="radio" value="2" name="respect">
                            </td>
                            <td class="text-center">
                                <input type="radio" value="3" name="respect">
                            </td>
                            <td class="text-center">
                                <input type="radio" value="4" name="respect">
                            </td>
                            <td class="text-center">
                                <input type="radio" value="5" name="respect">
                            </td>
                        </tr>

                        <tr>
                        <th scope="row" class="radio">Tehermegosztás</th>
                            <td class="text-center">
                                <input type="radio" value="1" name="share">
                            </td>
                            <td class="text-center">
                                <input type="radio" value="2" name="share">
                            </td>
                            <td class="text-center">
                                <input type="radio" value="3" name="share">
                            </td>
                            <td class="text-center">
                                <input type="radio" value="4" name="share">
                            </td>
                            <td class="text-center">
                                <input type="radio" value="5" name="share">
                            </td>
                        </tr>

                        <tr>
                        <th scope="row" class="radio">Munkavégzés sebessége</th>
                            <td class="text-center">
                                <input type="radio" value="1" name="speed">
                            </td>
                            <td class="text-center">
                                <input type="radio" value="2" name="speed">
                            </td>
                            <td class="text-center">
                                <input type="radio" value="3" name="speed">
                            </td>
                            <td class="text-center">
                                <input type="radio" value="4" name="speed">
                            </td>
                            <td class="text-center">
                                <input type="radio" value="5" name="speed">
                            </td>
                        </tr>
                    </tbody>
                </table>   
                </div>                           
                    
                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg mt-1 w-50">Űrlap beküldése</button>
                </div>              
            </form> 

            <!--Űrlap eredmények átlaga
            @else
                <div class="text-center">
                    <h5>Az űrlap sikeresen el lett mentve!</h5>
                    <br>
                    <hr style="width: 50%">
                    <br>
                </div>              
          
                <div class="card">
                    <h3 class="card-header">Eredmények:</h3>
                    <div class="card-body">
                        <h5>Csapat átlag: {{ form_sum_average($meeting->diaries) }}</h5>
                        <h5>Készség átlagok:</h5>
                        <ul class="h5">
                            <li>Kommunikáció: {{ form_sum_average_com($meeting->diaries) }}</li>
                            <li>Egymás segítése, támogatása: {{ form_sum_average_help($meeting->diaries) }}</li>
                            <li>Tisztelet: {{ form_sum_average_respect($meeting->diaries) }}</li>
                            <li>Tehermegosztás: {{ form_sum_average_share($meeting->diaries) }}</li>
                            <li>Munkavégzés sebessége: {{ form_sum_average_speed($meeting->diaries) }}</li>
                        </ul>
                    </div>
                </div>
            -->
            @endif
            <br>
            <hr style="width: 50%">
            <br>
        @endif
            
        <!--Akciópontok létrehozásának helye-->        
        <div class="card mb-4 mt-4">
        <a name="actionpoint"></a>
        <h3 class="card-header">Akciópont létrehozása</h3>
            <div class="card-body">

            <form action="{{ URL::route('newActionpoint', ['meeting_id' => $meeting->id]) }}#actionpoint" method="GET">                      
                <div>
                    <label for="description" class="h5">Akciópont leírása</label>
                    <textarea rows="4" cols="50" class="form-control @error('description') is-invalid @enderror" name="description" id="description" placeholder="Akciópont leírása">{{old("description")}}</textarea>
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
        <a name="kanban"></a>
        <h3>Kanban tábla</h3>
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
                @foreach ($meeting->actionpoints as $act)
                    @if($act->status == "to_do")                    
                        <div class="card" style="background-color: pink; width: 300px; margin-left: auto; margin-right: auto;">
                            <table class="card-header card-table table table-borderless text-center">
                                <thead>
                                <tr>
                                    <th scope="col" style="width:15%"></th>
                                    <th scope="col" style="width:70%">{{ $act->action_owner->name }}</th>
                                    <th scope="col" style="width:15%">
                                        <a class="btn btn-outline-danger btn-sm" style="float: right;" 
                                        href="{{ URL::route('statusChangeRightMeeting', ['act_id' => $act->id]) }}#kanban">></a>
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
                        <div class="card" style="background-color: aquamarine; width: 300px; margin-left: auto; margin-right: auto;">
                            <table class="card-header card-table table table-borderless text-center">
                                <thead>
                                <tr>
                                    <th scope="col" style="width:15%">
                                        <a class="btn btn-outline-success btn-sm" style="float: left;" 
                                        href="{{ URL::route('statusChangeLeftMeeting', ['act_id' => $act->id]) }}#kanban"><</a>
                                    </th>
                                    <th scope="col" style="width:70%">{{ $act->action_owner->name }}</th>
                                    <th scope="col" style="width:15%">
                                        <a class="btn btn-outline-success btn-sm" style="float: right;" 
                                        href="{{ URL::route('statusChangeRightMeeting', ['act_id' => $act->id]) }}#kanban">></a>
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
                        <div class="card" style="background-color: lightSkyBlue; width: 300px; margin-left: auto; margin-right: auto;">
                            <table class="card-header card-table table table-borderless text-center">
                                <thead>
                                <tr>
                                    <th scope="col" style="width:15%">
                                        <a class="btn btn-outline-primary btn-sm" style="float: left;"
                                        href="{{ URL::route('statusChangeLeftMeeting', ['act_id' => $act->id]) }}#kanban"><</a>
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
        
    </div>

    <!--Megbeszélés lezárása-->
    @if(Auth::user()->id == $meeting->meet_owner->id)
        <div class="text-center">
            <a class="btn btn-outline-danger btn-lg mt-5 w-50" onclick="return confirm('Biztosan le szeretné zárni a megbeszélést?')"
            href="{{ route('endMeeting', ['meeting_id' => $meeting->id]) }}">Megbeszélés lezárása</a>
        </div>
    @endif

    <div class="text-center">
        <a class="btn btn-primary btn-lg mt-5 w-50" href="{{ route('meetings') }}">Vissza</a>
    </div>

@endsection