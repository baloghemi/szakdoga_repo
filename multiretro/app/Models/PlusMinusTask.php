<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlusMinusTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'text', 'positive', 'negative', 'user_id', 'meeting_id'
    ];

    //egy feladatnak csak egy tulajdonosa lehet: 1->1
    public function task_owner() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    //egy feladat csak egy megbeszéléshez tartozhat: 1->1
    public function meeting_task() {
        return $this->belongsTo(Meeting::class, 'meeting_id', 'id');
    }
}
