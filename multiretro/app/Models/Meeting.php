<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'owner', 'meet_date', 'techniques', 'active', 'team_id'
    ];

    protected $casts = [
        'techniques' => 'array',
    ];

    //egy megbeszélésnek csak egy tulajdonosa lehet: 1->1
    public function meet_owner() {
        return $this->belongsTo(User::class, 'owner', 'id');
    }

    //egy megbeszélés csak egy csapathoz tartozhat: 1->1
    public function team() {
        return $this->belongsTo(Team::class, 'team_id', 'id');
    }

    //egy megbeszéléshez több akciópont tartozhat: 1->n
    public function actionpoints() {
        return $this->hasMany(Actionpoint::class, 'meeting_id');
    }

    //egy megbeszéléshez több plusz-mínusz feladat tartozhat: 1->n
    public function plus_minus_tasks() {
        return $this->hasMany(PlusMinusTask::class, 'meeting_id');
    }

    //egy megbeszéléshez több naplózott sor tartozhat: 1->n
    public function diaries() {
        return $this->hasMany(Diary::class, 'meeting_id');
    }

}
