<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'text', 'tag1', 'tag2', 'tag3', 'user_id'
    ];
    
    //egy blognak csak egy tulajdonosa lehet: 1->1
    public function blog_owner() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
