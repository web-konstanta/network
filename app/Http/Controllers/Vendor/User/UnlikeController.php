<?php

namespace App\Http\Controllers\Vendor\User;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Post;

class UnlikeController extends Controller
{
    public function __invoke($postId)
    {
        $userId = auth()->user()->id;
        $post = Post::find($postId);

        Like::where('user_id', $userId)
                    ->where('post_id', $postId)
                    ->first()
                    ->delete();

        return response()->json([
            'success' => true,
            'countLikes' => $post->likes->count()
        ]);
    }
}
