<?php

namespace App\Http\Controllers\Vendor\Post;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CreateController extends Controller
{
    public function __invoke(): View
    {
        $tags = Tag::all();
        return view('cabinet.post.create', compact('tags'));
    }
}
