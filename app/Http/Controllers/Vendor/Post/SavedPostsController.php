<?php

namespace App\Http\Controllers\Vendor\Post;

use App\Http\Controllers\Controller;
use App\Models\SavePost;
use Illuminate\View\View;

class SavedPostsController extends Controller
{
    public function __invoke(): View
    {
        $posts = SavePost::where('user_id', auth()->user()->id)->get();
        return view('cabinet.post.saved-posts', compact('posts'));
    }
}
