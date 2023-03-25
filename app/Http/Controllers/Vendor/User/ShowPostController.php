<?php

namespace App\Http\Controllers\Vendor\User;

use App\Http\Controllers\Controller;
use App\Models\Post;

class ShowPostController extends Controller
{
    public function __invoke(Post $post)
    {
        $currentUser = auth()->user();
        return view('cabinet.user.post_show', compact('post', 'currentUser'));  
    }
}
