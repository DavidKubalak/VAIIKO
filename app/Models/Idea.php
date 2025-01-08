<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $validated)
 * @method static latest()
 * @method static where(string $string, string $string1, $id)
 * @method static count()
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

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function canUpdate(): bool
    {
        return auth()->check() && (auth()->id() === $this->user_id || auth()->user()->is_admin);
    }

    public function canDelete(): bool
    {
        return auth()->check() && (auth()->id() === $this->user_id || auth()->user()->is_admin);
    }


    public function likes()
    {
        return $this->hasMany(Like::class);
    }


}
