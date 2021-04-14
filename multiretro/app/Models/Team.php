<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id'
    ];

    //egy csapat több felhasználóhoz tartozhat: n->n
    public function users() {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
    
    //egy csapatnak csak egy tulajdonosa lehet: 1->n
    public function team_owner() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    //egy csapatnak több meetingje is lehet: 1->n
    public function meetings() {
        return $this->hasMany(Meeting::class);
    }
}
