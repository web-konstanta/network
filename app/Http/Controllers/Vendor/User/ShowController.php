<?php

namespace App\Http\Controllers\Vendor\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Subscriber;
use App\Models\User;

class ShowController extends Controller
{
    public function __invoke(User $user)
    {
        $userId = auth()->user()->id;
        if ($userId === $user->id) {
            return redirect()->route('cabinet.index');
        }
        $customer = Subscriber::where('customer_id', $user->id)
            ->where('user_id', $userId)
            ->first();
        $posts = Post::where('user_id', $user->id)->get();
        return view('cabinet.user.cabinet', compact('user', 'posts', 'customer'));
    }
}
