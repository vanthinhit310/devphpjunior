<?php

namespace App\Http\Controllers;

use App\Service\AddressService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * @property  data
 */
class DevTestController extends Controller
{
    public function DevTest()
    {
        $image = 'https://i.imgur.com/3xWUC3z.jpg';
        $str = substr($image, 20, 7);
        echo($str);
    }

    public function index(AddressService $service)
    {
        $param = [];
        $param['titlePage'] = 'Test page';
        $param['cities'] = $service->getAllCities();
        return view('general.function_testing', $param);
    }

    public function uploadImage(AddressService $service)
    {
        $data = request()->all();
        $cities_id = $data['city'];
        $district_id = $data['district'];
        $ward_id = $data['ward'];
        $city = $service->getCity($cities_id);
        $district = $service->getDistrict($district_id);
        $ward = $service->getWard($ward_id);
        dd($ward->name. ' - '.$district->name. ' - '.$city->name);

    }

    public function getDistrictBelongToCity(Request $request, AddressService $service)
    {
        $city_id = $request->id;
        $districts = $service->getDistrictOfCity($city_id);
        try {
            if (!empty($districts)) {
                return response()->json([
                    'districts' => $districts
                ])->setStatusCode(Response::HTTP_OK);
            } else {
                return response()->json([
                    'Error' => 'Can\'t get data of this city at the moment. Please again!'
                ])->setStatusCode(Response::HTTP_BAD_REQUEST);
            }

        } catch (\Throwable $throwable) {
            return response()->json([
                'Error' => 'Unknown error! Please try later.'
            ])->setStatusCode(Response::HTTP_BAD_REQUEST);
        }
    }

    public function getWardOfDistrict(Request $request, AddressService $service)
    {
        $district_id = $request->id;
        $wards = $service->getWardOfDistrict($district_id);
        try {
            if (!empty($wards)) {
                return response()->json([
                    'wards' => $wards
                ])->setStatusCode(Response::HTTP_OK);
            } else {
                return response()->json([
                    'Error' => 'Can\'t get data of this city at the moment. Please again!'
                ])->setStatusCode(Response::HTTP_BAD_REQUEST);
            }

        } catch (\Throwable $throwable) {
            return response()->json([
                'Error' => 'Unknown error! Please try later.'
            ])->setStatusCode(Response::HTTP_BAD_REQUEST);
        }
    }
}
