<?php

namespace App\Http\Controllers\Vendor\User;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Post;

class LikeController extends Controller
{
    public function __invoke($postId)
    {
        $userId = auth()->user()->id;
        $post = Post::find($postId);

        $data = [
            'user_id' => $userId,
            'post_id' => $postId
        ];

        Like::firstOrCreate($data, $data);

        return response()->json([
            'success' => true,
            'countLikes' => $post->likes->count()
        ]);
    }
}
