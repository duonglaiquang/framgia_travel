<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Province;
use App\Models\ProvinceGallery;
use App\Models\Service;
use App\Models\ServiceGallery;
use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function provinces()
    {
        $provinces = Province::paginate(9);

        return view('pages.province.list', compact('provinces'));
    }

    public function hotelsList(Request $request)
    {
        $provinces = Province::where('name', '=', $request->name)->first();

        $hotels = Service::where('category_id', '=', 1)
            ->where('province_id', '=', $provinces->id)
            ->get();

        return view('pages.service.hotels.list', compact('hotels', 'provinces'));
    }

    public function hotels(Request $request)
    {
        $key = $request->inputSearch;
        $provinces = Province::where('name', 'like', "%$key%")->take(30)->paginate(5);

        return view('pages.service.hotels.search', compact('provinces', 'key'));
    }

    public function hotelPF(Request $request)
    {
        $hotel = Service::where('name', '=', $request->name1)->first();

        $images = ServiceGallery::where('service_id', '=', $hotel->id)->get();

        $comments = Comment::where('service_id', '=', $hotel->id)->get();

        $users = User::join('comments','users.id','=','comments.user_id')
            ->where('comments.service_id','=',$hotel->id)->get();

        $province = $request->name;

        return view('pages.service.hotels.profile', compact('hotel', 'images', 'province', 'comments','users'));
    }

    public function provincePF(Request $request)
    {
        $provinces = Province::where('name', '=', $request->name)->first();

        $images = ProvinceGallery::where('province_id', '=', $provinces->id)->get();

        return view('pages.province.profile', compact('provinces', 'images'));
    }

    public function showAdmin()
    {
        return view('admin.layouts.master');
    }

    public function requestGet()
    {
        $provinces = Province::all();

        return view('pages.action.request.request', compact('provinces'));
    }

    public function requestPost()
    {
        return view('pages.action.request.request');
    }
}
