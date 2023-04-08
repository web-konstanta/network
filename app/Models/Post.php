<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function isLikedBy(int $postId, object $user): mixed
    {
        $like = Like::where('post_id', $postId)
                    ->where('user_id', $user->id)
                    ->first();
        return $like;
    }

    public function isSavedBy(int $postId, object $user): mixed
    {
        $savedPost = SavePost::where('post_id', $postId)
                            ->where('user_id', $user->id)
                            ->first();
        return $savedPost;
    }

    public function isComplainedBy(int $postId, object $user): mixed
    {
        $complainedPost = Complain::where('user_id', $user->id)
                                ->where('post_id', $postId)
                                ->first();
        return $complainedPost;
    }
}
