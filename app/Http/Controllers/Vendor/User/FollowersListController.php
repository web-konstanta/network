<?php

namespace App\Http\Controllers\Vendor\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class FollowersListController extends Controller
{
    public function __invoke(User $user)
    {
        return view('cabinet.user.followers_list', compact('user'));
    }
}
