<?php

namespace App\Http\Controllers\Cabinet\Post;

use App\Models\Post;
use App\Models\Tag;
use App\Http\Controllers\Controller;

class EditController extends Controller
{
    public function __invoke(Post $post)
    {
        $tags = Tag::all();
        return view('cabinet.post.edit', compact('post', 'tags'));
    }
}
