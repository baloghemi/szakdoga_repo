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
        return view('diary.diary');
    }

    //időjárás jelentés mentés
    public function weather_report(Request $request, $meeting_id) {
        
        $diary = new Diary;
        
        $weather_report = $diary->weather_report;
        $weather_report['1'] = $request->input('performance');
        $weather_report['2'] = $request->input('collaboration');
        $weather_report['3'] = $request->input('feeling');
        $diary->weather_report = $weather_report;

        $diary->meeting_id = $meeting_id;

        $request->user()->owner_diaries()->save($diary);        

        return redirect()->route('joinMeeting', ['meeting_id' => $meeting_id]);
    }
}
