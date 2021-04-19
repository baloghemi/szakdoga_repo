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

    //új akciópont létrehozása
    public function new_actionpoint(Request $request, $meeting_id) {       
        $validated = $request->validate([
            'description' => 'required',           
        ]);

        $action = new Actionpoint;
        $action->description = $request->input('description');
        $action->act_date = now();
        $action->user_id = $request->input('user');
        $action->meeting_id = $meeting_id; 
        
        $action->save();        
        
        return redirect()->route('joinMeeting', ['meeting_id' => $meeting_id]);
    }

    //akciópont módosítása
    public function send_to_modify_actionpoint($act_id) {
        $action = Actionpoint::where('id', $act_id)->firstOrFail();
        return view('actionpoint.modify_actionpoint')->with('action', $action);
    }

    public function modify_actionpoint(Request $request, $act_id) {
        $action = Actionpoint::where('id', $act_id)->firstOrFail();

        $validated = $request->validate([
            'description' => 'required',           
        ]);

        $action->description = $request->input('description');        
        $action->user_id = $request->input('user'); 
        
        $action->save();

        return redirect()->route('actionpoints'); 
    }

    //akciópont törlése
    public function delete_actionpoint($act_id) {
        $action = Actionpoint::where('id', $act_id)->firstOrFail();
        
        $action->delete();

        return redirect()->route('actionpoints'); 
    }
    

}
