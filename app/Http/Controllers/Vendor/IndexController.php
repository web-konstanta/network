<?php

namespace App\Http\Controllers\Vendor;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::where('user_id', Auth::user()->id)->get();
        return view('cabinet.index', compact('posts'));
    }
}
