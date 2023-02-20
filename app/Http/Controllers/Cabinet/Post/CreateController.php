<?php

namespace App\Http\Controllers\Cabinet\Post;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        $tags = Tag::all();
        return view('cabinet.post.create', compact('tags'));
    }
}
