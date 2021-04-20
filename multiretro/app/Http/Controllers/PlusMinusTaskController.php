<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Meeting;
use App\Models\PlusMinusTask;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlusMinusTaskController extends Controller
{
    //új feladat létrehozása
    public function new_task(Request $request, $meeting_id) {

        $validated = $request->validate([
            'text' => 'required',
        ]);

        $task = new PlusMinusTask;
        $task->text = $request->input('text'); 
        $task->feeling = $request->input('feeling'); 
        $task->meeting_id = $meeting_id;

        $request->user()->owner_tasks()->save($task);        

        return redirect()->route('joinMeeting',['meeting_id' => $meeting_id]);
    }

    //pozitív hozzáadás
    public function positive_add($task_id) {
        $task = PlusMinusTask::where('id', $task_id)->firstOrFail();

        $task->positive += 1;
        $task->save();

        return redirect()->route('joinMeeting',['meeting_id' => $task->meeting_id]);
    }

    //negatív hozzáadás
    public function negative_add($task_id) {
        $task = PlusMinusTask::where('id', $task_id)->firstOrFail();

        $task->negative += 1;
        $task->save();

        return redirect()->route('joinMeeting',['meeting_id' => $task->meeting_id]);
    }
}
