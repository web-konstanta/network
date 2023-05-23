<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Jobs\DeleteComplainJob;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class DestroyController extends Controller
{
    public function __invoke(Post $post): RedirectResponse
    {
        DeleteComplainJob::dispatch(
            $post->id,
            $post->user->id
        );
        $post->delete();
        return redirect()->back();
    }
}
