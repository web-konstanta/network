<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.post.index', [
            'user'  => auth()->user(),
            'posts' => Post::getComplainedPosts()
        ]);
    }
}
