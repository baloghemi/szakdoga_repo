<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actionpoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'description', 'status', 'act_date', 'user_id', 'meeting_id'
    ];

    //egy akciópontnak csak egy tulajdonosa lehet: 1->n
    public function action_owner() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    //egy akciópont csak egy megbeszéléshez tartozhat
    public function meeting_act() {
        return $this->belongsTo(Meeting::class, 'meeting_id', 'id');
    }


}
