<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\ProvinceGallery;
use App\Models\Service;
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

        $hotels = Service::where([['category_id', '=', 1], ['province_id', '=', $provinces->id],])->get();

        return view('pages.service.hotels.list', compact('hotels', 'provinces'));
    }

    public function hotels(Request $request)
    {
        $key = $request->inputSearch;
        $provinces = Province::where('name', 'like', "%$key%")->take(30)->paginate(5);

        return view('pages.service.hotels.search', compact('provinces', 'key'));
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
