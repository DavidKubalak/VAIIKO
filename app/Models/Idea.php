<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $validated)
 * @method static latest()
 * @method static where(string $string, string $string1, $id)
 */
class Idea extends Model
{
    protected $fillable = [
        'user_id',
        'content',
    ];

    protected $with = [
        'user:id,name,image',
        'comments.user:id,name,image',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearch($query, $search = ''): void
    {
        $query->where('content', 'like', '%' . $search . '%');
    }
    public function canUpdate(): bool
    {
        return auth()->check() && $this->user_id === auth()->id();
    }

    public function canDelete(): bool
    {
        return auth()->check() && $this->user_id === auth()->id();
    }
}
