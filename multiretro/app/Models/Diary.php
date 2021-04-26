<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    use HasFactory;

    protected $fillable = [
        'weather_report', 'form', 'plus_minus', 'kanban', 'user_id', 'meeting_id'
    ];
    
    protected $casts = [
        'weather_report' => 'array', //számokban menteni le -> átlagokhoz
        'plus_minus'     => 'array',
        'kanban'         => 'array',
        'form'           => 'array', //kulcs-érték párok
    ];

    //egy naplózott sornak csak egy tulajdonosa lehet: 1->1
    public function diary_owner() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    //egy naplózott sor csak egy megbeszéléshez tartozhat: 1->1
    public function meeting_diary() {
        return $this->belongsTo(Meeting::class, 'meeting_id', 'id');
    }
    
}
