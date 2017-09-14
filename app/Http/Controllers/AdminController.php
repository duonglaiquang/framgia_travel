<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Province;
use App\Models\RequestedService;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function userList()
    {
        $users = User::where('level', '<>', -1)->get();

        return view('admin.users.list', compact('users'));
    }

    public function userBlock()
    {
        $users = User::where('level', -1)->get();

        return view('admin.users.blocked', compact('users'));
    }

    public function blockUser(Request $request)
    {
        $block = User::find($request->id);
        $block->level = -1;
        $block->update();

        return redirect()->route('userBlock');
    }

    public function unblockUser(Request $request)
    {
        $unblock = User::find($request->id);
        $unblock->level = 0;
        $unblock->update();

        return redirect()->route('userList');
    }

    public function provinceList()
    {
        $provinces = Province::all();
        foreach ($provinces as $province) {
            $province->hotel = Service::where('province_id', '=', $province->id)->where('category_id', '=', 1)->get()
                ->count();
            $province->restaurant = Service::where('province_id', '=', $province->id)->where('category_id', '=', 2)
                ->get()
                ->count();
            $province->amusement = Service::where('province_id', '=', $province->id)->where('category_id', '=', 3)->get()
                ->count();
            $province->save();
        }

        return view('admin.provinces.list', compact('provinces'));
    }

    public function provinceGetAdd()
    {
        return view('admin.provinces.add');
    }

    public function provincePostAdd(Request $request)
    {
        $province = new Province();
        $province->fill($request->all());
        $province->save();

        return redirect(route('provinceShowList'));
    }

    public function provinceDelete(Request $request)
    {
        $province = Province::find($request->id);
        $province->delete();

        return redirect(route('provinceShowList'));
    }

    public function provinceGetEdit(Request $request)
    {
        $province = Province::find($request->id);

        return view('admin.provinces.edit', compact('province'));
    }

    public function provincePostEdit(Request $request)
    {
        $province = Province::find($request->id);
        $province->update($request->all());
        $province->save();

        return redirect(route('provinceShowList'));
    }

    public function serviceRequested()
    {
        $RS = RequestedService::all();
        $provinces = Province::all();
        $categories = Category::all();

        return view('admin.services.requested', compact('RS', 'provinces', 'categories'));
    }

    public function approveRequest(Request $request)
    {
        $Rservice = RequestedService::find($request->id);
        $Rservice->status = 1;
        $Rservice->save();

        $service = new Service();
        $service->category_id = $Rservice->category_id;
        $service->province_id = $Rservice->province_id;
        $service->name = $Rservice->name;
        $service->description = $Rservice->description;
        $service->address = $Rservice->address;
        $service->open_time = $Rservice->open_time;
        $service->expected_price = $Rservice->expected_price;
        $service->phone = $Rservice->phone;
        $service->profile_pic = $Rservice->profile_pic;

        $service->save();

        return redirect(route('serviceRequested'));
    }

    public function cancelRequest(Request $request)
    {
        $Rservice = RequestedService::find($request->id);
        $Rservice->status = 2;
        $Rservice->save();

        return redirect(route('serviceRequested'));
    }

    public function serviceList()
    {
        $services = Service::all();

        return view('admin.services.list', compact('services'));
    }
}
