<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Jobs\ApproveComplainJob;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class ApproveController extends Controller
{
    public function __invoke(Post $post): RedirectResponse
    {
        foreach ($post->complains as $complain) {
            $complain->delete();
        }

        ApproveComplainJob::dispatch(
            $post->id,
            $post->user->id
        );

        return redirect()->back();
    }
}
