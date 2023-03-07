<?php

namespace App\Http\Controllers\Vendor\Post;

use App\Models\Post;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class EditController extends Controller
{
    public function __invoke(Post $post): View
    {
        $tags = Tag::all();
        return view('cabinet.post.edit', compact('post', 'tags'));
    }
}
