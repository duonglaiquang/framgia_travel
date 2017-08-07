<?php

namespace App\Http\Controllers;

use App\Province;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function provinces()
    {
        $provinces = Province::all();

        return view('pages.province.list', compact('provinces'));
    }

    public function provincePF(Request $request)
    {
        $provinces = Province::where('name', '=', $request->name)->first();

        return view('pages.province.profile', compact('provinces'));
    }

    public function showAdmin()
    {
        return view('admin.layouts.master');
    }
}
