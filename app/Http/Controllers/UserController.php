<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Province;
use App\Models\RequestedService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user();
        $plans = Plan::with('plan_location.province')
            ->where('user_id', $user->id)
            ->orderBy('id', 'desc')->get();
        $RServices = RequestedService::where('user_id', '=', Auth::user()->id)->orderBy('id', 'DESC')->get();
        $provinces = Province::all();

        return view('pages.user.profile', compact('user', 'plans', 'RServices', 'provinces'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $user->update($request->all());
        $user->save();

        return redirect(route('user.update', Auth::user()->id));
    }
}
