<?php

namespace App\Http\Controllers\Vendor;

use App\Models\User;
use App\Http\Controllers\Controller;

class DestroyController extends Controller
{
    public function __invoke(User $user)
    {
        $user->delete();
        return redirect('login/')->with('success', 'An account deleted successfully');
    }
}
