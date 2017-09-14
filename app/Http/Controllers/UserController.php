<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Province;
use App\Models\RequestedService;
use App\Models\UserGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user();
        $photos = UserGallery::where('user_id', '=', Auth::user()->id)->get();

        $user->picture = UserGallery::where('user_id', '=', Auth::user()->id)->get()->count();

        $plans = Plan::with('plan_location.province')
            ->where('user_id', $user->id)
            ->orderBy('id', 'desc')->get();
        $user->plan = Plan::with('plan_location.province')
            ->where('user_id', $user->id)->get()->count();
        $user->save();

        $RServices = RequestedService::where('user_id', '=', Auth::user()->id)->orderBy('id', 'DESC')->get();
        $provinces = Province::all();

        return view('pages.user.profile', compact('user', 'plans', 'RServices', 'provinces', 'photos'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $user->update($request->all());
        $photo = $request->photo;
        $filename = $user->id . 'profilePic' . '.png';
        if ($photo != "") {
            $photo->storeAs('public', $filename);
        }
        $user->profile_pic = $filename;
        $user->save();

        return redirect(route('user.update', Auth::user()->id))->withInput(['tab' => 'settings']);;
    }
}
