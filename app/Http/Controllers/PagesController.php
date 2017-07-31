<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Province;

class PagesController extends Controller
{
    public function showProfile($id)
    {
        $province = Province::find($id)

        return view('pages.user.profile', compact('user'));
    }


}

