<?php

namespace App\Http\Controllers\Cabinet\Post;

use App\Models\Post;
use App\Http\Controllers\Cabinet\Post\BaseController;

class DestroyController extends BaseController
{
    public function __invoke(Post $post)
    {
        $this->service->delete($post);
        return redirect()->route('cabinet.index');
    }
}
