<?php

namespace App\Http\Controllers\Vendor\User;

use App\Http\Controllers\Controller;
use App\Jobs\ComplainJob;
use App\Models\Complain;
use App\Models\User;

class ComplainController extends Controller
{
    public function __invoke($postId)
    {
        $userId = auth()->user()->id;

        $data = [
            'user_id' => $userId,
            'post_id' => $postId
        ];

        Complain::firstOrCreate($data, $data);
        ComplainJob::dispatch($postId, $userId);

        return response()->json([
            'success' => true
        ]);
    }
}
