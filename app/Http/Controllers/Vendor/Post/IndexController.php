<?php

namespace App\Http\Controllers\Vendor\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        return view('cabinet.post.index', compact('posts'));
    }
}
