<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'text', 'tags', 'user_id'
    ];
    
    protected $casts = [
        'tags' => 'array',
    ];

    //egy blognak csak egy tulajdonosa lehet: 1->1
    public function blog_owner() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
