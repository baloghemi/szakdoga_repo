<?php

namespace App\Http\Controllers;
use App\Models\User;
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
        return view('actionpoint.actionpoint_list', ['actionpoints' => Actionpoint::orderBy('act_date')->get()]);
    }
}
