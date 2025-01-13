<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @method static create(array $array)
 * @method static count()
 * @method static latest()
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'bio',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function ideas() {
        return $this->hasMany(Idea::class)->latest();
    }

    public function comments() : HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function followers(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_follows', 'following_id', 'follower_id');
    }

    public function followings(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_follows', 'follower_id', 'following_id');
    }

    public function follows(User $user): bool
    {
        return $this->followings()->where('following_id', $user->id)->exists();
    }

    public function likes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function likedIdeas(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Idea::class, 'likes', 'user_id', 'idea_id');
    }

    public function likedComments(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Comment::class, 'likes', 'user_id', 'comment_id');
    }

    public function receivedLikes(): int
    {
        $ideaLikes = $this->ideas()->withCount('likes')->get()->sum('likes_count');
        $commentLikes = $this->comments()->withCount('likes')->get()->sum('likes_count');

        return $ideaLikes + $commentLikes;
    }

    public function getImageUrl(): string
    {
        if ($this->image) {
            return asset($this->image);
        }
        return "https://ui-avatars.com/api/?name={$this->name}&background=random&size=128";
    }

}
