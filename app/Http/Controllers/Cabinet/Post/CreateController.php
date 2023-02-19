<?php

namespace App\Http\Controllers\Cabinet\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('cabinet.post.create');
    }
}
