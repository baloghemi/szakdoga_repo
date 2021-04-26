<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Meeting;
use App\Models\Diary;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiaryController extends Controller
{
    public function diary() {
        return view('diary.diary', ['diaries' => Diary::all()]);
    }

    //időjárás jelentés mentés
    public function weather_report(Request $request, $meeting_id) {        
        
        $diary = Diary::where('user_id', Auth::user()->id)->where('meeting_id', $meeting_id)->first(); 
        if (!isset($diary)) {
            $diary = new Diary;
            $diary->meeting_id = $meeting_id;
        } 
        
        $weather_report = $diary->weather_report;
        $weather_report['1'] = $request->input('performance');
        $weather_report['2'] = $request->input('collaboration');
        $weather_report['3'] = $request->input('feeling');
        $diary->weather_report = $weather_report;

        $request->user()->owner_diaries()->save($diary);        

        return redirect()->route('joinMeeting', ['meeting_id' => $meeting_id]);
    }

    //űrlap mentés
    public function form(Request $request, $meeting_id) {

        $diary = Diary::where('user_id', Auth::user()->id)->where('meeting_id', $meeting_id)->first(); 
        if (!isset($diary)) {
            $diary = new Diary;
            $diary->meeting_id = $meeting_id;
        } 

        $form = $diary->form;
        $form['1'] = $request->input('communication');
        $form['2'] = $request->input('help');
        $form['3'] = $request->input('respect');
        $form['4'] = $request->input('share');
        $form['5'] = $request->input('speed');
        $diary->form = $form;        

        $request->user()->owner_diaries()->save($diary);

        return redirect()->route('joinMeeting', ['meeting_id' => $meeting_id]);
    }
}
