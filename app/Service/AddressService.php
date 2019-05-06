<?php
/**
 * Created by PhpStorm.
 * User: vanth
 * Date: 5/6/2019
 * Time: 2:02 PM
 */

namespace App\Service;


use App\Model\City;
use App\Model\District;
use App\Model\Ward;

class AddressService
{
    public function getAllCities(){
        $cities = City::all();
        return $cities;
    }
    public function getDistrictOfCity($city_id){
        $districts = District::where('city_id', $city_id)->get();
        return $districts;
    }
    public function getWardOfDistrict($district_id){
        $wards = Ward::where('district', $district_id)->get();
        return $wards;
    }

    public function getCity($id)
    {
        $city = City::find($id);
        return $city;
    }
    public function getDistrict($id)
    {
        $District = District::find($id);
        return $District;
    }
    public function getWard($id)
    {
        $Ward = Ward::find($id);
        return $Ward;
    }
}
