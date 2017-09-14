<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Plan;
use App\Models\PlanDetail;
use App\Models\PlanLocation;
use App\Models\Province;
use App\Models\ProvinceGallery;
use App\Models\RequestedService;
use App\Models\Service;
use App\Models\ServiceGallery;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        $type = $request->id;


        $hotels = Service::all();

        foreach ($hotels as $hotel) {
            $hotel->rate_average = Comment::where('service_id', '=', $hotel->id)
                ->where('rate_point', '>', '0')
                ->avg('rate_point');

            $hotel->comment = Comment::where('service_id', '=', $hotel->id)
                ->get()
                ->count();

            $hotel->save();
        }

        $hotels = Service::where('category_id', '=', $type)
            ->where('province_id', '=', $provinces->id)
            ->orderBy('rate_average', 'DESC')
            ->get();

        return view('pages.service.hotels.list', compact('hotels', 'provinces', 'type'));
    }

    public function provinceSearch(Request $request)
    {
        $key = $request->inputSearch;
        $provinces = Province::where('name', 'like', "%$key%")->take(30)->paginate(5);

        return view('pages.province.search', compact('provinces', 'key'));
    }

    public function serviceList(Request $request)
    {
        $type = $request->id;

        return view('pages.service.provinceSearch', compact('type'));
    }

    public function serviceListSearch(Request $request)
    {
        $key = $request->inputSearch;
        $type = $request->id;
        $provinces = Province::where('name', 'like', "%$key%")->take(30)->paginate(5);

        return view('pages.service.search', compact('provinces', 'key', 'type'));
    }

    public function PFsearch(Request $request)
    {
        $key = $request->inputSearch;
        $type = $request->id;
        $province = $request->id1;

        $items = Service::where('name', 'like', "%$key%")
            ->where('category_id', '=', $type)
            ->where('province_id', '=', $province)
            ->get();

        foreach ($items as $item) {
            $resultSearch[] = $item->name;
        }

        return $resultSearch;
    }

    public function hotelPF(Request $request)
    {
        $type = $request->id;

        $hotel = Service::where('name', '=', $request->name1)->first();

        $images = ServiceGallery::where('service_id', '=', $hotel->id)->get();

        $comments = Comment::where('service_id', '=', $hotel->id)->orderBy('id', 'DESC')->get();

        $hotel->rate_average = Comment::where('service_id', '=', $hotel->id)
            ->where('rate_point', '>', '0')
            ->avg('rate_point');

        $hotel->rate_count = Comment::where('service_id', '=', $hotel->id)
            ->where('rate_point', '>', '0')->get()->count();

        $hotel->comment = Comment::where('service_id', '=', $hotel->id)
            ->get()
            ->count();

        $hotel->save();

        $users = User::join('comments', 'users.id', '=', 'comments.user_id')
            ->where('comments.service_id', '=', $hotel->id)
            ->select('user_id', 'profile_pic', 'name')
            ->distinct()
            ->get();

        $province = $request->name;

        return view('pages.service.hotels.profile', compact('hotel', 'images', 'province', 'comments', 'users', 'type'));
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

        return view('pages.action.request.add', compact('provinces'));
    }

    public function requestPost(Request $request)
    {
        $choices = $request->proChoice;
        $plan = new Plan();
        $plan->fill($request->all());
        $plan->user_id = Auth::user()->id;
        $plan->save();
        foreach ($choices as $choice) {
            $pl = new PlanLocation();
            $pl->province_id = $choice;
            $pl->plan_id = $plan->id;
            $pl->save();
        }

        return redirect(route('user.profile', Auth::user()->id))->withInput(['tab' => 'plans']);;
    }

    public function requestEditGet(Request $request)
    {
        $plann = Plan::with('plan_location')->find($request->id);
        $details = DB::table('plan_details')
            ->where('plan_details.plan_id', $request->id)
            ->leftJoin('services', 'services.id', 'plan_details.service_id')
            ->leftJoin('categories', 'categories.id', 'services.category_id')
            ->leftJoin('provinces', 'provinces.id', 'services.province_id')
            ->select('provinces.name as pro_name', 'services.name as ser_name', 'categories.name as cat_name', 'services.category_id as type', 'plan_details.title as title', 'plan_details.started_at as started_at', 'plan_details.end_at as end_at', 'plan_details.date as date', 'plan_details.detail as detail')
            ->get();
        $choices = $plann->plan_location;
        $provinces = Province::all();
        $types = Category::all();
        $services = Service::all();

        return view('pages.action.request.edit', compact('plann', 'provinces', 'choices', 'details', 'types', 'services'));
    }

    public function requestEditPost(Request $request)
    {
        $plann = Plan::find($request->id);
        $plann->update($request->all());
        $plann->save();
        $choices = is_array($request->proChoice) ? $request->proChoice : [];
        $deletes = PlanLocation::where('plan_id', '=', $request->id)->get();
        foreach ($deletes as $delete) {
            $delete->delete();
        }
        foreach ($choices as $choice) {
            $pl = new PlanLocation();
            $pl->province_id = $choice;
            $pl->plan_id = $request->id;
            $pl->save();
        }
        for ($i = 0; $i < $request->numb; $i++) {
            $s1 = new PlanDetail();
            $s1->plan_id = $plann->id;
            $s1->date = $request->date[ $i ];

            $s1->started_at = $request->sta[ $i ];
            $s1->end_at = $request->end[ $i ];
            $s1->service_id = $request->ser[ $i ];
            $s1->title = $request->tit[ $i ];
            $s1->detail = $request->des[ $i ];
            $s1->save();
        }

        return redirect(route('user.profile', Auth::user()->id))->withInput(['tab' => 'plans']);;
    }

    public function requestDelete(Request $request)
    {
        $delete = Plan::find($request->id);
        $delete->delete();

        return redirect(route('user.profile', Auth::user()->id))->withInput(['tab' => 'plans']);;
    }

    public function comment(Request $request)
    {
        $type = $request->id1;

        $hotel = Service::where('name', '=', $request->name1)->first();

        $user = Auth::user();

        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->service_id = $hotel->id;
        $comment->title = $request->title;
        $comment->content = $request->content;
        $comment->rate_point = $request->rate_point;
        $comment->save();

        switch ($type) {
            case 1:
                return redirect(route('hotelPF', [$request->name, $type, $request->name1]));
                break;

            case 2:
                return redirect(route('restaurantPF', [$request->name, $type, $request->name1]));
                break;

            case 3:
                return redirect(route('activityPF', [$request->name, $type, $request->name1]));
                break;
        }
    }

    public function editComment(Request $request)
    {
        $type = $request->id1;
        $comment = Comment::find($request->id);
        $comment->title = $request->title;
        $comment->content = $request->content;
        $comment->save();

        return redirect(route('hotelPF', [$request->name, $type, $request->name1]));
    }

    public function deleteComment(Request $request)
    {
        $type = $request->id1;
        Comment::destroy($request->id);

        return redirect(route('hotelPF', [$request->name, $type, $request->name1]));
    }

    public function requestService()
    {
        $provinces = Province::all();
        $categories = Category::all();

        return view('pages.service.request', compact('provinces', 'categories'));
    }

    public function requestServicePost(Request $request)
    {
        $RS = new RequestedService();
        $RS->fill($request->all());
        $RS->user_id = Auth::user()->id;
        $RS->status = '0';
        $RS->save();

        return redirect(route('user.profile', Auth::user()->id))->withInput(['tab' => 'RS']);;
    }
}
