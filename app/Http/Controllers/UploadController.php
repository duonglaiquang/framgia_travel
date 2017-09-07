<?php

namespace App\Http\Controllers;

use App\Models\UserGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    public function uploadForm()
    {
        return route('user.profile', Auth::user()->id);
    }

    public function uploadSubmit(Request $request)
    {
        $photo = $request->photo;
        $user = Auth::user();
        $id = $user->picture + 1;
        $filename = $user->name . $id . '.png';
        $photo->storeAs('public', $filename);

        UserGallery::create([
            'user_id'  => Auth::user()->id,
            'filename' => $filename,
        ]);

        return redirect(route('user.profile', Auth::user()->id));
    }

    public function deletePic(Request $request)
    {
        UserGallery::destroy($request->id);

        return redirect(route('user.profile', Auth::user()->id));
    }
}
