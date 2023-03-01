<?php

namespace App\Http\Controllers\Vendor;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Search\SearchRequest;

class SearchUserController extends Controller
{
    public function __invoke(SearchRequest $request)
    {
        $users = User::where('name', 'LIKE', "%{$request->search}%")->get();
        session()->put(['users' => $users]);
        return redirect()->route('cabinet.search');
    }
}
