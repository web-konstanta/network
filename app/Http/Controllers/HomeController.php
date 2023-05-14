<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->role !== User::USER_ROLE) {
            return redirect()->route('admin.index');
        }
        $userId = auth()->user()->id;
        $posts = Post::where('user_id', $userId)->get();
        $user = User::where('id', $userId)->first();
        return view('cabinet.index', compact('posts', 'user'));
    }
}
