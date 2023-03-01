<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke()
    {
        $users = session('users') ?? [];
        return view('cabinet.search', compact('users'));
    }
}
