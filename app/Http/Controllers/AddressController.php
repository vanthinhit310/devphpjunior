<?php

namespace App\Http\Controllers;

use App\Service\AddressService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AddressController extends Controller
{
    //
    public function getDistrict(Request $request, AddressService $service)
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

    public function getWards(Request $request, AddressService $service)
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
