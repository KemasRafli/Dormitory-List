<?php

namespace App\Service;

use Illuminate\Support\Facades\DB;

class IndonesiaService
{

    public static function provinces($province)
    {
        if ($province) {
            $data = DB::connection('main')->table('provinces')->where('name', 'like', '%'.$province.'%')->get();
        } else {
            $data = DB::connection('main')->table('provinces')->get();
        }
        return $data;
    }

    public static function province($province_id , $text = false)
    {
        $data = DB::connection('main')->table('provinces')->where('id', $province_id)->first();

        if ($data && $text == true) {
          return $data->name;
        } else if (!$data && $text == true) {
          return '';
        }
        return $data;
    }

    public static function listRegency($param = null)
    {
        if ($param) {
            $data = DB::connection('main')->table('regencies')->where('name', 'like', '%'.$param.'%')->get();
        } else {
            $data = DB::connection('main')->table('regencies')->get();
        }
        return $data;
    }

    public static function regencies($province_id, $param)
    {
        if ($param) {
            $data = DB::connection('main')->table('regencies')->where('province_id', $province_id)->where('name', 'like', '%'.$param.'%')->get();
        } else {
            $data = DB::connection('main')->table('regencies')->where('province_id', $province_id)->get();
        }
        return $data;
    }

    public static function regency($regency_id , $text = false)
    {
        $data = DB::connection('main')->table('regencies')->where('id', $regency_id)->first();

        if ($data && $text == true) {
          return $data->name;
        } else if (!$data && $text == true) {
          return '';
        }
        return $data;
    }

    public static function regencies_districts($param)
    {
        $regencies = DB::connection('main')->table('regencies')->where('name', 'like', '%'.$param.'%')->get()->toArray();
        $districts = DB::connection('main')->table('districts')->where('name', 'like', '%'.$param.'%')->get()->toArray();
        $data = array_merge($regencies, $districts);
        return $data;
    }

    public static function regency_district($param)
    {
        $regency = DB::connection('main')->table('regencies')->where('id', $param)->first();
        $district = DB::connection('main')->table('districts')->where('id', $param)->first();
        if ($regency) {
            return $regency;
        }
        return $district;
    }

    public static function districts($regency_id, $param)
    {
        if ($param) {
            $data = DB::connection('main')->table('districts')->where('regency_id', $regency_id)->where('name', 'like', '%'.$param.'%')->get();
        } else {
            $data = DB::connection('main')->table('districts')->where('regency_id', $regency_id)->get();
        }
        return $data;
    }

    public static function district($district_id , $text = false)
    {
        $data = DB::connection('main')->table('districts')->where('id', $district_id)->first();

        if ($data && $text == true) {
          return $data->name;
        } else if (!$data && $text == true) {
          return '';
        }
        return $data;
    }

    public static function villages($district_id, $param)
    {
        if ($param) {
            $data = DB::connection('main')->table('villages')->where('district_id', $district_id)->where('name', 'like', '%'.$param.'%')->get();
        } else {
            $data = DB::connection('main')->table('villages')->where('district_id', $district_id)->get();
        }
        return $data;
    }

    public static function village($village_id , $text = false)
    {
        $data = DB::connection('main')->table('villages')->where('id', $village_id)->first();

        if ($data && $text == true) {
          return $data->name;
        } else if (!$data && $text == true) {
          return '';
        }
        return $data;
    }

    public static function getFull($village, $district, $regency, $province)
    {
        $village = IndonesiaService::village($village);
        $district = IndonesiaService::district($district);
        $regency = IndonesiaService::regency($regency);
        $province = IndonesiaService::province($province);
        return ['village' => $village->name, 'district' => $district->name, 'regency' => $regency->name, 'province' => $province->name];
    }
}
