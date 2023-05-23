<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class EditController extends Controller
{
    public function __invoke(User $user): View
    {
        return view('admin.user.edit', [
            'user'  => auth()->user(),
            'item'  => $user
        ]);
    }
}
