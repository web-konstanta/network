<?php

namespace App\Http\Controllers\Vendor\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\View\View;

class ShowController extends Controller
{
    public function __invoke(Post $post): View
    {
        return view('cabinet.post.show', compact('post'));
    }
}
