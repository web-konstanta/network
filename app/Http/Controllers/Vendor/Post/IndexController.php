<?php

namespace App\Http\Controllers\Vendor\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Subscriber;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        $customersIds = Subscriber::where('user_id', auth()->user()->id)
            ->get()
            ->pluck('customer_id')
            ->toArray();
        $posts = Post::whereIn('user_id', $customersIds)
            ->orderBy('id', 'desc')
            ->get();
        $currentUser = auth()->user();
        return view('cabinet.post.index', compact('posts', 'currentUser'));
    }
}
