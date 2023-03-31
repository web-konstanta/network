<?php

namespace App\Http\Controllers\Vendor\User;

use App\Http\Controllers\Controller;
use App\Models\SavePost;

class UnsavePostController extends Controller
{
    public function __invoke($postId)
    {
        $userId = auth()->user()->id;

        SavePost::where('user_id', $userId)
                            ->where('post_id', $postId)
                            ->first()
                            ->delete();
        
        return response()->json([
            'success' => true
        ]);
    }
}
