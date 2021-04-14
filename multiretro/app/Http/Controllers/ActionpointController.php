<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Meeting;
use App\Models\Actionpoint;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ActionpointController extends Controller
{
    public function actionpoints() {
        return view('actionpoint.actionpoints', 
                    ['actionpoints' => Actionpoint::where('user_id', Auth::user()->id)->orderBy('act_date')->get()]);
    }

    //akciópontok listázása
    public function actionpoint_list() {
        return view('actionpoint.actionpoint_list', ['actionpoints' => Actionpoint::orderBy('act_date')->get(),
                                                     'meetings' => Meeting::orderBy('meet_date')->get()]);
    }

    //státusz módosítása
    public function status_change_right($act_id) {    
        $action = Actionpoint::where('id', $act_id)->firstOrFail();

        if ($action->status == 'to_do') {
            $action->status = 'doing';            
        }
        else { //doing
            $action->status = 'done';           
        }

        $action->updated_at = now();
        $action->save();

        return redirect()->route('actionpoints'); 
    }

    public function status_change_left($act_id) { 
        $action = Actionpoint::where('id', $act_id)->firstOrFail();

        if ($action->status == 'doing') {
            $action->status = 'to_do';            
        }       
        else { //done
            $action->status = 'doing';
        }
        $action->updated_at = now();
        $action->save();

        return redirect()->route('actionpoints'); 
    }
}
