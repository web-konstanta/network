<?php

namespace App\Http\Controllers\Vendor\User;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class SubscriberController extends Controller
{
    public function __invoke(User $user): RedirectResponse
    {
        $userId = auth()->user()->id;
        $data = [
            'user_id' => $userId,
            'customer_id' => $user->id
        ];
        $customer = Subscriber::where('user_id', $userId)->first();
        is_null($customer)
            ? Subscriber::create($data)
            : Subscriber::firstOrCreate([
            'user_id' => $userId,
            'customer_id' => $user->id
        ], $data);
        return redirect()->back();
    }
}
