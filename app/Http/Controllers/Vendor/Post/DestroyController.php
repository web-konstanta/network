<?php

namespace App\Http\Controllers\Vendor\Post;

use App\Models\Post;
use App\Http\Controllers\Vendor\Post\BaseController;

class DestroyController extends BaseController
{
    public function __invoke(Post $post)
    {
        $this->service->delete($post);
        return redirect()->route('cabinet.index');
    }
}
