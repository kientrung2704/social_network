<?php

namespace App\Models;

use App\Scopes\ReverserScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ReverserScope());
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes', 'post_id', 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}