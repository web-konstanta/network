<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cabinet\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        if (isset($data['avatar'])) {
            $data['avatar'] = Storage::disk('public')->put('avatar', $data['avatar']);
        }
        $user->update($data);
        return redirect()->route('cabinet.index');
    }
}
