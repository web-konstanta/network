<?php

namespace App\Http\Controllers\Vendor\User;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Subscriber;

class UnfollowController extends Controller
{
    public function __invoke(User $user)
    {
        $userId = auth()->user()->id;
        Subscriber::where('user_id', $userId)
            ->where('customer_id', $user->id)
            ->delete();
        return redirect()->back();
    }
}
