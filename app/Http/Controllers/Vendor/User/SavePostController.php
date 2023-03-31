<?php

namespace App\Http\Controllers\Vendor\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\SavePost;

class SavePostController extends Controller
{
    public function __invoke($postId)
    {
        $userId = auth()->user()->id;
        $post = Post::find($postId);

        $data = [
            'user_id' => $userId,
            'post_id' => $postId
        ];

        SavePost::firstOrCreate($data, $data);

        return response()->json([
            'success' => true,
            'postName' => $post->text
        ]);
    }
}
