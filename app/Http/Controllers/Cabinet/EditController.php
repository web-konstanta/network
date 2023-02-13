<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Models\Hobby;
use App\Models\User;

class EditController extends Controller
{
    public function __invoke(User $user)
    {
        $hobbies = Hobby::all();
        return view('cabinet.edit', compact('user', 'hobbies'));
    }
}
