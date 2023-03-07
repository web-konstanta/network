<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        $userId = auth()->user()->id;
        $posts = Post::where('user_id', $userId)->get();
        $user = User::where('id', $userId)->first();
        return view('cabinet.index', compact('posts', 'user'));
    }
}
