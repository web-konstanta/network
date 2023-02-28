<?php

namespace App\Http\Controllers\Vendor\User;

use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function __invoke(User $user)
    {
        if (auth()->user()->id === $user->id) {
            return redirect()->route('cabinet.index');
        }
        $posts = Post::where('user_id', $user->id)->get();
        return view('cabinet.user.cabinet', compact('user', 'posts'));
    }
}
