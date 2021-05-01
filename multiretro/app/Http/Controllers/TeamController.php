<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Team;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function teams() {            
        return view('team.teams', ['teams' => Team::where('user_id', Auth::user()->id)->get(), 
                                   'tagok' => Auth::user()->teams()->orderBy('id')->get()]);
    }

    //új csapat létrehozása
    public function send_to_new_team() {
        return view('team.modify_team', ['users' => User::all()]);
    }

    public function new_team(Request $request) {        
        $validated = $request->validate([
            'name' => 'required|max:255',
            'people' => 'required'
        ]);

        $team = new Team;
        $team->name = $request->input('name');
                
        $rec = $request->user()->owner_teams()->save($team);
        $rec->users()->attach($request->input('people'));
        
        return redirect()->route('teams');
    }

    //csapat szerkesztése
    public function send_to_modify_team($team_id) {
        $team = Team::where('id', $team_id)->firstOrFail();
        return view('team.modify_team', ['users' => User::all()])->with('team', $team);
    }

    public function modify_team(Request $request, $team_id) {
        $team = Team::where('id', $team_id)->firstOrFail();
        $validated = $request->validate([
            'name' => 'required|max:255',
            'people' => 'required'
        ]);
        $team->update($validated);      
        
        $team->users()->detach();  
        $rec = $request->user()->owner_teams()->save($team);
        $rec->users()->attach($request->input('people'));

        return redirect()->route('teams', ['team_id' => $team->$team_id]);
    }

    //csapatok listázása
    public function team_list() {
        return view('team.team_list', ['teams' => Team::all()]);
    }

    //csapat törlése
    public function delete_team($team_id) {
        $team = Team::where('id', $team_id)->firstOrFail();
       
        $team->users()->detach();
        foreach($team->meetings as $meeting) {
            foreach($meeting->actionpoints as $action){
                $action->delete();
            }
            foreach($meeting->plus_minus_tasks as $task){
                $task->delete();
            }
            foreach($meeting->diaries as $diary) {
                $diary->delete();
            }
            $meeting->delete();
        }
        $team->delete();

        return redirect()->route('teams'); 
    }
}
