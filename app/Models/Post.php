<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public static function search($search)
    {
        return self::where('title', "like", "%{$search}%")
        ->orWhere('content', "like", "%{$search}%")
        ->with(['user','comments'])
        ->paginate(3);
    }
}
