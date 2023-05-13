<?php

namespace App\Http\Controllers\Vendor\Post;

use App\Models\Post;
use App\Http\Controllers\Vendor\Post\BaseController;
use Illuminate\Http\RedirectResponse;

class DestroyController extends BaseController
{
    public function __invoke(Post $post): RedirectResponse
    {
        $post->delete();
        return redirect()->route('cabinet.index');
    }
}
