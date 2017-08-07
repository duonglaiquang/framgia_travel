<?php

namespace App\Http\Controllers;

use App\Province;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function provinces()
    {
        $provinces = Province::all();

        return view('pages.provinces', compact('provinces'));
    }

    public function provincePF(Request $request)
    {
        $provinces = Province::where('id', '=', $request->id)->first();

        return view('pages.province', compact('provinces'));
    }

    public function showAdmin()
    {
        return view('admin.admin_template');
    }
}
