<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'owner', 'meet_date', 'active', 'team_id'
    ];

    //egy megbeszélésnek csak egy tulajdonosa lehet: 1->n
    public function meet_owner() {
        return $this->belongsTo(User::class, 'owner', 'id');
    }

    //egy megbeszélés csak egy csapathoz tartozhat
    public function team() {
        return $this->belongsTo(Team::class, 'team_id', 'id');
    }

    //egy megbeszéléshez több akciópont tartozhat: 1->n
    public function actionpoints() {
        return $this->hasMany(Actionpoint::class, 'actionpoint_id', 'id');
    }

    //egy megbeszéléshez több plusz-mínusz feladat tartozhat: 1->n
    public function plus_minus_tasks() {
        return $this->hasMany(PlusMinusTask::class, 'plus_minus_task_id', 'id');
    }

    //egy megbeszéléshez több naplózott sor tartozhat: 1->n
    public function diaries() {
        return $this->hasMany(Diary::class, 'diary_id', 'id');
    }

}