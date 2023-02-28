<?php

namespace App\Http\Controllers\Vendor\Post;

use App\Service\PostService;

class BaseController
{
    public $service;

    public function __construct(PostService $postService)
    {
        $this->service = $postService;
    }
}
