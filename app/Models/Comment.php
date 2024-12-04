<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'idea_id',
        'content',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function idea(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Idea::class);
    }
}
