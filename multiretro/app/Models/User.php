<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    //Egy felhasználó több csapathoz is tartozhat: n->n
    public function teams() {
        return $this->belongsToMany(Team::class)->withTimestamps();
    }

    //egy felhasználónak több csapatja lehet: 1->n
    public function owner_teams() {
        return $this->hasMany(Team::class, 'user_id');
    }

    //egy felhasználónak több megbeszélése lehet: 1->n
    public function owner_meetings() {
        return $this->hasMany(Meeting::class, 'owner');
    }

    //egy felhasználónak több akciópontja lehet: 1->n
    public function owner_actionpoints() {
        return $this->hasMany(Actionpoint::class, 'user_id');
    }

    //egy felhasználónak több blogja lehet: 1->n
    public function owner_blogs() {
        return $this->hasMany(Blog::class, 'user_id');
    }

    //egy felhasználónak több plusz-mínusz feladata lehet: 1->n
    public function owner_tasks() {
        return $this->hasMany(PlusMinusTask::class, 'user_id');
    }

    //egy felhasználónak több naplózott sora lehet: 1->n
    public function owner_diaries() {
        return $this->hasMany(Diary::class, 'user_id');
    }
    
}
