<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cabinet\UpdateRequest;
use App\Models\User;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        if (isset($data['avatar'])) {
            $avatarName = md5(Carbon::now() . '_' . $data['avatar']->getClientOriginalName());
            $avatar = Image::make($data['avatar'])
                            ->fit(80, 80)
                            ->save(public_path('storage/avatar/' . $avatarName . '.jpg'));
            $data['avatar'] = 'avatar/' . $avatar->basename;
        }
        $user->update($data);
        return redirect()->route('cabinet.index');
    }
}
