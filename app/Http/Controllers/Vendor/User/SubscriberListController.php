<?php

namespace App\Http\Controllers\Vendor\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class SubscriberListController extends Controller
{
    public function __invoke(User $user)
    {
        return view('cabinet.user.subscribers_list', compact('user'));
    }
}
