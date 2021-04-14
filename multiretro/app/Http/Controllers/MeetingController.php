<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\User;
use App\Models\Team;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MeetingController extends Controller
{
    public function meetings() {
        return view('meeting.meetings', ['meetings' => Meeting::where('owner', Auth::user()->id)->get(),
                                         'teams' => Team::all(),
                                         'all_meet' => Meeting::all()]);
    }

    //új megbeszélés létrehozása
    public function send_to_new_meeting() {
        return view('meeting.modify_meeting', ['teams' => Team::all()]);
    }

    public function new_meeting(Request $request) {       
        $validated = $request->validate([
            'name' => 'required',
            'meet_date' => 'required',
        ]);

        $meeting = new Meeting;
        $meeting->name = $request->input('name');
        $meeting->meet_date = $request->input('meet_date');
        $meeting->team_id = $request->input('team');
                
        $request->user()->owner_meetings()->save($meeting);
        
        return redirect()->route('meetings');
    }

    //megbeszélés szerkesztése
    public function send_to_modify_meeting($meeting_id) {
        $meeting = Meeting::where('id', $meeting_id)->firstOrFail();
        return view('meeting.modify_meeting', ['teams' => Team::all()])->with('meeting', $meeting);
    }

    public function modify_meeting(Request $request, $meeting_id) {
        $meeting = Meeting::where('id', $meeting_id)->firstOrFail();
        $validated = $request->validate([
            'name' => 'required',
            'meet_date' => 'required',
        ]);
        $meeting->update($validated);
        $meeting->team_id = $request->input('team');
         
        $rec = $request->user()->owner_meetings()->save($meeting);       

        return redirect()->route('meetings', ['meeting_id' => $meeting->$meeting_id]);
    }

    //megbeszélések listázása
    public function meeting_list() {
        return view('meeting.meeting_list', ['meetings' => Meeting::orderBy('meet_date')->get()]);
    }

    //megbeszélés törlése
    public function delete_meeting($meeting_id) {
        $meeting = Meeting::where('id', $meeting_id)->firstOrFail();  
        
        $meeting->delete();

        return redirect()->route('meetings'); 
    }

    //csatlakozás
    public function join_meeting($meeting_id) {
        $meeting = Meeting::where('id', $meeting_id)->firstOrFail();
        return view('meeting.join_meeting')->with('meeting', $meeting);
    }

}
