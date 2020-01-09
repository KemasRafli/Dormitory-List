<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Service\IndonesiaService;

use Illuminate\Support\Facades\DB;

class IndonesiaController extends Controller
{
    
    public function provinces(Request $request)
    {
        $data = IndonesiaService::provinces($request->q);
        return response()->json(['data' => $data]);
    }

    public function province(Request $request)
    {
        $data = IndonesiaService::province($request->province_id);
        return response()->json(['data' => $data]);
    }

    public function listRegency(Request $request)
    {
        if ($request->q) {
            $data = IndonesiaService::listRegency($request->q);
        } else {
            $data = IndonesiaService::listRegency();
        }
        return response()->json(['data' => $data]);
    }

    public function regencies(Request $request)
    {
        if ($request->q) {
            $data = IndonesiaService::regencies($request->province_id, $request->q);
        } else {
            $data = IndonesiaService::regencies($request->province_id, null);
        }
        return response()->json(['data' => $data]);
    }

    public function regency(Request $request)
    {
        $data = IndonesiaService::regency($request->regency_id);
        return response()->json(['data' => $data]);
    }

    public function districts(Request $request)
    {
        if ($request->q) {
            $data = IndonesiaService::districts($request->regency_id, $request->q);
        } else {
            $data = IndonesiaService::districts($request->regency_id, null);
        }
        return response()->json(['data' => $data]);
    }

    public function district(Request $request)
    {
        $data = IndonesiaService::district($request->district_id);
        return response()->json(['data' => $data]);
    }

    public function villages(Request $request)
    {
        if ($request->q) {
            $data = IndonesiaService::villages($request->district_id, $request->q);
        } else {
            $data = IndonesiaService::villages($request->district_id, null);
        }
        return response()->json(['data' => $data]);
    }

    public function village(Request $request)
    {
        $data = IndonesiaService::village($request->village_id);
        return response()->json(['data' => $data]);
    }
}
