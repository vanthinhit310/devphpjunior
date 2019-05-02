<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class DevTestController extends Controller
{
    //
    public function DevTest()
    {

        $date = Carbon::now();
        $date->date('Y-m-d');
        echo $date;
    }
}
