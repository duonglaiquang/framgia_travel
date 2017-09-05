<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function selectAjax(Request $request)
    {
        if ($request->ajax()) {
            $request->province_id;
            $request->type_id;

            $servicess = DB::table('services')
                ->where('province_id', $request->province_id)
                ->where('category_id', $request->type_id)
                ->get();

            return response()->json($servicess);
        }
    }
}
